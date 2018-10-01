@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>Create Product</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('admin.product.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group row" {{ $errors->has('tag_id') ? ' has-error' : '' }}>
                                <label for="parent_id" class="col-md-2">
                                    Tag ID
                                </label>
                                <div class="col-md-10">
                                    <select class="form-control m-b" name="tag_id">
                                        @if (count($tags))
                                            @foreach($tags as $item)
                                                @foreach($item as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name_cn . '  [' . ($loop->parent->index + 1) . ']' }}</option>
                                                @endforeach
                                            @endforeach
                                        @endif
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
                                    <input id="title_cn" type="text" class="form-control" name="title_cn" placeholder="Title CN" value="{{ old('title_cn') }}" required autofocus>
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
                                    <input id="title_en" type="text" class="form-control" name="title_en" placeholder="Title EN" value="{{ old('title_en') }}" required>
                                    @if ($errors->has('title_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('title_jp') ? ' has-error' : '' }}">
                                <label for="title_jp" class="col-md-2">
                                    Title JP
                                </label>
                                <div class="col-md-10">
                                    <input id="title_jp" type="text" class="form-control" name="title_jp" placeholder="Title JP" value="{{ old('title_jp') }}" required>
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
                                    <textarea id="content_cn" name="content_cn">{!! old('content_cn') !!}</textarea>
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
                                    <textarea id="content_en" name="content_en">{!! old('content_en') !!}</textarea>
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
                                    <textarea id="content_jp" name="content_jp">{!! old('content_jp') !!}</textarea>
                                    @if ($errors->has('content_jp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content_jp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Create
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
        $(document).ready(function () {
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