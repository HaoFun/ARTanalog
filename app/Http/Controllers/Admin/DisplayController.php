<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DisplayRequest;
use App\Repositories\DisplayRepository;
use App\Tool\ForUploader;
use App\Tool\Uploader;

class DisplayController extends Controller
{
    protected $display;
    protected $uploader;
    protected $forUploader;
    protected $fillField = [
        'corporation_cn',
        'corporation_en',
        'corporation_jp',
        'address_cn',
        'address_en',
        'address_jp',
        'zip_code',
        'fax',
        'tel'
    ];

    public function __construct(DisplayRepository $display, ForUploader $forUploader, Uploader $uploader)
    {
        $this->display = $display;
        $this->uploader = $uploader;
        $this->forUploader = $forUploader;
        $this->middleware(['auth']);
    }

    public function edit()
    {
        $display = $this->display->first();
        $logo = $this->forUploader->getFileType($display->logo);
        $display_image = $this->forUploader->getFileType($display->display_image);
        return view('admin.display.edit', compact('display', 'logo', 'display_image'));
    }

    public function update(DisplayRequest $request)
    {
        $display = $this->display->first();
        $path = $this->forUploader->CheckAndMarkDir('logo');
        if ($this->uploader->initialize('logo', [
            'limit' => 1,
            'uploadDir' => $path . '/',
            'title' => 'name',
            'fileMaxSize' => 10,
            'maxSize' => 50,
            'extensions' => ['jpg', 'jpeg', 'png']
        ])) {
            $file = $this->uploader->upload();
            if ($warning = $this->forUploader->CheckDataWarning($file)) {
                return back()->with('icon', $warning)->withInput($request->all());
            }
            $before_file = $this->forUploader->getOldFile($this->uploader->getListInput(), $display->logo);
            $before_file ? $this->forUploader->crop_image($request, 'fileuploader-list-logo') : '';
            $after_file = $this->forUploader->getFile($this->forUploader->CheckDataSuccess($file));
            $logo = $this->forUploader->checkSaveFileList($before_file, $after_file);
        }

        $path = $this->forUploader->CheckAndMarkDir('display_image');
        if ($this->uploader->initialize('display_image', [
            'limit' => 1,
            'uploadDir' => $path . '/',
            'title' => 'name',
            'fileMaxSize' => 10,
            'maxSize' => 50,
            'extensions' => ['jpg', 'jpeg', 'png']
        ])) {
            $file = $this->uploader->upload();
            if ($warning = $this->forUploader->CheckDataWarning($file)) {
                return back()->with('icon', $warning)->withInput($request->all());
            }
            $before_file = $this->forUploader->getOldFile($this->uploader->getListInput(), $display->display_image);
            $before_file ? $this->forUploader->crop_image($request, 'fileuploader-list-display_image') : '';
            $after_file = $this->forUploader->getFile($this->forUploader->CheckDataSuccess($file));
            $display_image = $this->forUploader->checkSaveFileList($before_file, $after_file);
        }
        $display->update(array_merge(array_only($request->all(), $this->fillField), [
            'logo' => serialize($logo),
            'display_image' => serialize($display_image),
        ]));
        return redirect()->route('admin.home');
    }
}
