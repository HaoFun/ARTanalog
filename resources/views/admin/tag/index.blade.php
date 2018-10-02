@extends('layouts.app')

@section('title', 'Tag main page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/blueimp-gallery.min.css') }}">
@endsection

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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Parent ID</th>
                                    <th class="text-center">Name CN</th>
                                    <th class="text-center">Content CN</th>
                                    <th class="text-center">Icon</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td class="text-center">
                                        {{ $tag->id }}
                                    </td>
                                    <td class="text-center">
                                        {{ $tag->parent_id }}
                                    </td>
                                    <td class="text-center">
                                        {{ $tag->name_cn }}
                                    </td>
                                    <td class="text-center">
                                        {{ str_limit(strip_tags($tag->content_cn), 30, '...') }}
                                    </td>
                                    <td class="text-center">
                                        <div class="lightBoxGallery">
                                            @if (file_exists(array_first(unserialize(($tag->icon)))))
                                                <a href="{{ asset(array_first(unserialize(($tag->icon)))) . '?v=' . str_random('10') }}" data-gallery="">
                                                    <img src="{{ asset(array_first(unserialize(($tag->icon)))) . '?v=' . str_random('10') }}" style="height: 64px; max-width: 100px">
                                                </a>
                                            @endif
                                        </div>
                                        <div id="blueimp-gallery" class="blueimp-gallery">
                                            <div class="slides"></div>
                                            <h3 class="title"></h3>
                                            <a class="prev">‹</a>
                                            <a class="next">›</a>
                                            <a class="close">×</a>
                                            <a class="play-pause"></a>
                                            <ol class="indicator"></ol>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.tag.edit', $tag->id) }}" type="button" class="btn btn-success">Edit</a>
                                        <form action="{{ route('admin.tag.destroy', $tag->id) }}" method="post" style=" display: inline;">
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

@section('scripts')
    <script src="{{ asset('js/jquery.blueimp-gallery.min.js') }}"></script>
@endsection