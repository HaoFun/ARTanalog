<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Repositories\TagRepository;
use App\Tool\ForUploader;
use App\Tool\Uploader;

class TagController extends Controller
{
    protected $tag;
    protected $forUploader;
    protected $uploader;
    protected $fillField = [
        'parent_id',
        'name_cn',
        'name_en',
        'name_jp',
        'content_cn',
        'content_en',
        'content_jp',
        'parent_id',
    ];

    public function __construct(TagRepository $tag, ForUploader $forUploader, Uploader $uploader)
    {
        $this->tag = $tag;
        $this->uploader = $uploader;
        $this->forUploader = $forUploader;
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = $this->tag->findWithPaginate('tag');
        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        $tags = $this->tag->tagList(['id', 'name_cn', 'name_en', 'name_jp']);
        return view('admin.tag.create', compact('tags'));
    }

    public function store(TagRequest $request)
    {
        $path = $this->forUploader->CheckAndMarkDir('tag');
        if ($this->uploader->initialize('icon', [
            'limit' => 1,
            'required' => true,
            'uploadDir' => $path . '/',
            'title' => 'name',
            'fileMaxSize' => 10,
            'maxSize' => 50,
            'extensions' => ['jpg', 'jpeg', 'png']
        ])) {
            $file = $this->uploader->upload();
            if($warning = $this->forUploader->CheckDataWarning($file)) {
                return back()->with('icon', $warning)->withInput($request->all());
            }
            $images = $this->forUploader->getFile($this->forUploader->CheckDataSuccess($file));
            $this->tag->create(array_merge(array_only($request->all(), $this->fillField), [
                'icon' => serialize($images)
            ]));
            return redirect()->route('admin.tag.index');
        }
    }

    public function edit(Tag $tag)
    {
        $icon = $this->forUploader->getFileType($tag->icon);
        $tags = $this->tag->tagList(['id', 'name_cn', 'name_en', 'name_jp']);
        return view('admin.tag.edit', compact('tag', 'icon', 'tags'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $path = $this->forUploader->CheckAndMarkDir('tag');
        if ($this->uploader->initialize('icon', [
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
            $before_file = $this->forUploader->getOldFile($this->uploader->getListInput(), $tag->icon);
            $before_file ? $this->forUploader->crop_image($request, 'fileuploader-list-icon') : '';
            $after_file = $this->forUploader->getFile($this->forUploader->CheckDataSuccess($file));
            $images = $this->forUploader->checkSaveFileList($before_file, $after_file);
            $tag->update(array_merge(array_only($request->all(), $this->fillField), [
                'icon' => serialize($images)
            ]));
            return redirect()->route('admin.tag.index');
        }
    }

    public function destroy(Tag $tag)
    {
        if ($fail = $this->tag->existsChildAndProduct($tag->id)) {
            flash($fail . 'used !')->error()->important();
            return redirect()->route('admin.tag.index');
        }
        $this->forUploader->deleteFile($tag->icon);
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
