@extends('layouts.app')

@section('title', 'Tag main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <label for="" class="col-md-3">
                            <h3>Tag List</h3>
                        </label>
                        <div class="col-md-offset-6 col-md-3">
                            <a href="{{ route('admin.tag.create') }}" type="button" class="btn btn-block btn-primary pull-right">Create Tag</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">Content CN</th>
                                <th class="text-center">Content EN</th>
                                <th class="text-center">Content JP</th>
                                <th class="text-center">Icon</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @foreach($tags as $tag)
                                <tr>
                                    <td class="text-center">
                                        {{ str_limit($tag->content_cn, 20, '...') }}
                                    </td>
                                    <td class="text-center">
                                        {{ str_limit($tag->content_en, 20, '...') }}
                                    </td>
                                    <td class="text-center">
                                        {{ str_limit($tag->content_jp, 20, '...') }}
                                    </td>
                                    <td class="text-center">
                                        {{ $tag->icon }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.tag.edit', $tag->id) }}" type="button" class="btn btn-success form-control">Edit</a>
                                        <form action="{{ route('admin.tag.destroy', $tag->id) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger form-control" type="submit">Delete</button>
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
