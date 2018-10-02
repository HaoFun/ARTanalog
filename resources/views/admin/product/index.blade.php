@extends('layouts.app')

@section('title', 'Product main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <label for="" class="col-md-3">
                            <h3>Product List</h3>
                        </label>
                        <div class="col-md-offset-6 col-md-3">
                            <a href="{{ route('admin.product.create') }}" type="button" class="btn btn-block btn-primary pull-right">Create Product</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">Create at</th>
                                <th class="text-center">Title CN</th>
                                <th class="text-center">Content CN</th>
                                <th class="text-center">Tag Name CN</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">
                                        {{ $product->created_at->toDateString() }}
                                    </td>
                                    <td class="text-center">
                                        {{ $product->title_cn }}
                                    </td>
                                    <td class="text-center">
                                        {{ str_limit(strip_tags($product->content_cn), 30, '...') }}
                                    </td>
                                    <td class="text-center">
                                        {{ $product->tag->name_cn }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.product.edit', $product->id) }}" type="button" class="btn btn-success form-control">Edit</a>
                                        <form action="{{ route('admin.product.destroy', $product->id) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger form-control" type="button" onclick="ConfirmDelete(this)">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
