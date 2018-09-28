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
        $tags = $this->tag->paginate();
        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(TagRequest $request)
    {
        $path = $this->forUploader->CheckAndMarkDir('tag');
        if ($this->uploader->initialize('icon', [
            'required' => true,
            'uploadDir' => $path . '/',
            'title' => 'name',
            'fileMaxSize' => 10,
            'maxSize' => 50,
            'extensions' => ['jpg', 'jpeg', 'png']
        ])) {
            $file = $this->uploader->upload();
            dd($file);
            if($warning = $this->forUploader->CheckDataWarning($file)) {
                return back()->with('warning', $warning)->withInput($request->all());
            }
            $update_list = $this->forUploader->getFile($this->forUploader->CheckDataSuccess($file));
            $this->tag->create(array_merge(array_only($request->all(), [

                'icon' => base64_encode(serialize($update_list))
            ]), $this->fillField));
            return redirect()->route('admin.tag.index');
        }
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update(array_only($request->all(), $this->fillField));
        return redirect()->route('admin.tag.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
