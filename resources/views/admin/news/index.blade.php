@extends('layouts.app')

@section('title', 'News main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <label for="" class="col-md-3">
                            <h3>News List</h3>
                        </label>
                        <div class="col-md-offset-6 col-md-3">
                            <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-block btn-primary pull-right">Create News</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Create at</th>
                                    <th class="text-center">Title CN</th>
                                    <th class="text-center">Content CN</th>
                                    <th class="text-center">Publish at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $item->created_at->toDateString() }}
                                    </td>
                                    <td class="text-center">
                                        {{ $item->title_cn }}
                                    </td>
                                    <td class="text-center">
                                        {{ str_limit(strip_tags($item->content_cn), 30, '...') }}
                                    </td>
                                    <td class="text-center">
                                        {{ $item->publish_at->toDateString() }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.news.edit', $item->id) }}" type="button" class="btn btn-success">Edit</a>
                                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="post" style=" display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger" type="button" onclick="ConfirmDelete(this)">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
