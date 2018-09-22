<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Repositories\NewsRepository;

class NewsController extends Controller
{
    protected $news;
    protected $fillField = [
        'title_cn',
        'title_en',
        'title_jp',
        'content_cn',
        'content_en',
        'content_jp',
        'publish_at',
    ];

    public function __construct(NewsRepository $news)
    {
        $this->news = $news;
        $this->middleware('auth');
    }

    public function index()
    {
        $news = $this->news->paginate();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request)
    {
        $this->news->create(array_only($request->all(), $this->fillField));
        return redirect()->route('admin.news.index');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news)
    {
        $news->update(array_only($request->all(), $this->fillField));
        return redirect()->route('admin.news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
