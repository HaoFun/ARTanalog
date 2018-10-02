@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>Update Product</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('admin.product.update', $product->id) }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="type" class="col-md-2">
                                    Type
                                </label>
                                <div class="col-md-10">
                                    <select class="form-control m-b tag_type">
                                        @foreach($types as $type)
                                            <option value="{{ $type }}" @if ($type === $product->tag->type) selected="selected" @endif>{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row" {{ $errors->has('tag_id') ? ' has-error' : '' }}>
                                <label for="parent_id" class="col-md-2">
                                    Tag ID
                                </label>
                                <div class="col-md-10">
                                    <select class="form-control m-b tag_list" name="tag_id">

                                    </select>
                                    @if ($errors->has('tag_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tag_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('title_cn') ? ' has-error' : '' }}">
                                <label for="title_cn" class="col-md-2">
                                    Title CN
                                </label>
                                <div class="col-md-10">
                                    <input id="title_cn" type="text" class="form-control" name="title_cn" placeholder="Title CN" value="{{ $product->title_cn }}" required autofocus>
                                    @if ($errors->has('title_cn'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_cn') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('title_en') ? ' has-error' : '' }}">
                                <label for="title_en" class="col-md-2">
                                    Title EN
                                </label>
                                <div class="col-md-10">
                                    <input id="title_en" type="text" class="form-control" name="title_en" placeholder="Title EN" value="{{ $product->title_en }}" required autofocus>
                                    @if ($errors->has('title_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('title_jp') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-2">
                                    Title JP
                                </label>
                                <div class="col-md-10">
                                    <input id="title_jp" type="text" class="form-control" name="title_jp" placeholder="Title JP" value="{{ $product->title_jp }}" required autofocus>
                                    @if ($errors->has('title_jp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_jp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('content_cn') ? ' has-error' : '' }}">
                                <label for="content_cn" class="col-md-2">
                                    Content CN
                                </label>
                                <div class="col-md-10">
                                    <textarea id="content_cn" name="content_cn">{!! $product->content_cn !!}</textarea>
                                    @if ($errors->has('content_cn'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content_cn') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('content_en') ? ' has-error' : '' }}">
                                <label for="content_en" class="col-md-2">
                                    Content EN
                                </label>
                                <div class="col-md-10">
                                    <textarea id="content_en" name="content_en">{!! $product->content_en !!}</textarea>
                                    @if ($errors->has('content_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('content_jp') ? ' has-error' : '' }}">
                                <label for="content_jp" class="col-md-2">
                                    Content JP
                                </label>
                                <div class="col-md-10">
                                    <textarea id="content_jp" name="content_jp">{!! $product->content_jp !!}</textarea>
                                    @if ($errors->has('content_jp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content_jp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('vendor.ueditor.assets')
@section('scripts')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script>
        function getTagChildList(value) {
            $.ajax({
                url : "/api/getChild/" + value,
                type : 'get',
                datatype : 'json',
                timeout:3000
            }).done(function (data) {
                $('.tag_list').html('');
                $.each(data, function (index, value) {
                    $('.tag_list').append('<option value=' + value.id + '>' + value.name_cn + '</option>');
                });
                $('.tag_list option[value="{{$product->tag_id}}"]').attr('selected', 'selected');
            }).fail(function () {

            });
        }

        $(document).ready(function () {
            getTagChildList($('.tag_type').val());

            $(document).on('change', '.tag_type', function () {
                getTagChildList($(this).val());
            });

            UE.getEditor('content_cn',
                {
                    initialFrameHeight:150,
                    scaleEnabled:false,
                    toolbars: [
                        [
                            'fontsize', 'fontfamily', 'bold', 'forecolor', 'italic',
                            'underline', 'strikethrough', 'blockquote', 'justifyleft',
                            'justifycenter', 'justifyright', 'link', 'insertimage',
                            'insertframe'
                        ]
                    ],
                    autoHeight:150,
                    elementPathEnabled: false,
                    enableContextMenu: false,
                    autoClearEmptyNode:true,
                    wordCount:false,
                    imagePopup:false,
                    autotypeset:{ indent: true,imageBlockLine: 'center' },
                    initialStyle:'p{line-height:30px;}'
                });

            UE.getEditor('content_en',
                {
                    initialFrameHeight:150,
                    scaleEnabled:false,
                    toolbars: [
                        [
                            'fontsize', 'fontfamily', 'bold', 'forecolor', 'italic',
                            'underline', 'strikethrough', 'blockquote', 'justifyleft',
                            'justifycenter', 'justifyright', 'link', 'insertimage',
                            'insertframe'
                        ]
                    ],
                    autoHeight:150,
                    elementPathEnabled: false,
                    enableContextMenu: false,
                    autoClearEmptyNode:true,
                    wordCount:false,
                    imagePopup:false,
                    autotypeset:{ indent: true,imageBlockLine: 'center' },
                    initialStyle:'p{line-height:30px;}'
                });

            UE.getEditor('content_jp',
                {
                    initialFrameHeight:150,
                    scaleEnabled:false,
                    toolbars: [
                        [
                            'fontsize', 'fontfamily', 'bold', 'forecolor', 'italic',
                            'underline', 'strikethrough', 'blockquote', 'justifyleft',
                            'justifycenter', 'justifyright', 'link', 'insertimage',
                            'insertframe'
                        ]
                    ],
                    autoHeight:150,
                    elementPathEnabled: false,
                    enableContextMenu: false,
                    autoClearEmptyNode:true,
                    wordCount:false,
                    imagePopup:false,
                    autotypeset:{ indent: true,imageBlockLine: 'center' },
                    initialStyle:'p{line-height:30px;}'
                });
        });
    </script>
@endsection