<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\TagRepository;

class ProductController extends Controller
{
    protected $tag;
    protected $product;
    protected $fillField = [
        'title_cn',
        'title_en',
        'title_jp',
        'content_cn',
        'content_en',
        'content_jp',
        'tag_id',
    ];

    public function __construct(TagRepository $tag, ProductRepository $product)
    {
        $this->tag = $tag;
        $this->product = $product;
        $this->middleware('auth');
    }

    public function index()
    {
        $products = $this->product->findWithPaginate('tag');
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $tags = $this->tag->tagList();
        return view('admin.product.create', compact('tags'));
    }

    public function store(ProductRequest $request)
    {
        $this->product->create(array_only($request->all(), $this->fillField));
        return redirect()->route('admin.product.index');
    }

    public function edit(Product $product)
    {
        $tags = $this->tag->tagList();
        return view('admin.product.edit', compact('product', 'tags'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update(array_only($request->all(), $this->fillField));
        return redirect()->route('admin.product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
