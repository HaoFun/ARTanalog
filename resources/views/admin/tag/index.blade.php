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
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">Parent Name CN</th>
                                <th class="text-center">Content CN</th>
                                <th class="text-center">Icon</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @foreach($tags as $tag)
                                <tr>
                                    <td class="text-center">
                                        {{ isset($tag->parent_id) ? $tag->tag->name_cn : null }}
                                    </td>
                                    <td class="text-center">
                                        {{ str_limit($tag->content_cn, 20, '...') }}
                                    </td>
                                    <td class="text-center">
                                        <div class="lightBoxGallery">
                                            <a href="{{ asset(array_first(unserialize(($tag->icon)))) . '?v=' . str_random('10') }}" data-gallery="">
                                                <img src="{{ asset(array_first(unserialize(($tag->icon)))) . '?v=' . str_random('10') }}" style="height: 64px; max-width: 100px">
                                            </a>
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

@section('scripts')
    <script src="{{ asset('js/jquery.blueimp-gallery.min.js') }}"></script>
@endsection