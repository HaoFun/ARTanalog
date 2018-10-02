@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/jquery.fileuploader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fileuploader-theme-thumbnails.css') }}">
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>Update Display</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('admin.display.update') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group row {{ $errors->has('corporation_cn') ? ' has-error' : '' }}">
                                <label for="corporation_cn" class="col-md-2">
                                    Corporation CN
                                </label>
                                <div class="col-md-10">
                                    <input id="corporation_cn" type="text" class="form-control" name="corporation_cn" placeholder="Corporation CN" value="{{ $display->corporation_cn or old('corporation_cn') }}" required autofocus>
                                    @if ($errors->has('corporation_cn'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('corporation_cn') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('corporation_en') ? ' has-error' : '' }}">
                                <label for="corporation_cn" class="col-md-2">
                                    Corporation EN
                                </label>
                                <div class="col-md-10">
                                    <input id="corporation_en" type="text" class="form-control" name="corporation_en" placeholder="Corporation EN" value="{{ $display->corporation_en or old('corporation_en') }}" required>
                                    @if ($errors->has('corporation_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('corporation_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('corporation_jp') ? ' has-error' : '' }}">
                                <label for="corporation_cn" class="col-md-2">
                                    Corporation JP
                                </label>
                                <div class="col-md-10">
                                    <input id="corporation_jp" type="text" class="form-control" name="corporation_jp" placeholder="Corporation JP" value="{{ $display->corporation_jp or old('corporation_jp') }}" required>
                                    @if ($errors->has('corporation_jp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('corporation_jp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="content-group form-group row {{ $errors->has('address_cn') ? ' has-error' : '' }}">
                                <label for="address_cn" class="col-md-2">
                                    Address CN
                                </label>
                                <div class="col-md-10">
                                    <input id="address_cn" name="address_cn" class="form-control" value="{{ $display->address_cn or old('address_cn') }}">
                                    @if ($errors->has('address_cn'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address_cn') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="content-group form-group row {{ $errors->has('address_en') ? ' has-error' : '' }}">
                                <label for="address_en" class="col-md-2">
                                    Address EN
                                </label>
                                <div class="col-md-10">
                                    <input id="address_en" name="address_en" class="form-control" value="{{ $display->address_en or old('address_en') }}">
                                    @if ($errors->has('address_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="content-group form-group row {{ $errors->has('address_jp') ? ' has-error' : '' }}">
                                <label for="address_jp" class="col-md-2">
                                    Address JP
                                </label>
                                <div class="col-md-10">
                                    <input id="address_jp" name="address_jp" class="form-control" value="{{ $display->address_jp or old('address_jp') }}">
                                    @if ($errors->has('address_jp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address_jp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="content-group form-group row {{ $errors->has('zip_code') ? ' has-error' : '' }}">
                                <label for="zip_code" class="col-md-2">
                                    Zip Code
                                </label>
                                <div class="col-md-10">
                                    <input id="zip_code" name="zip_code" class="form-control" value="{{ $display->zip_code or old('zip_code') }}">
                                    @if ($errors->has('zip_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zip_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="content-group form-group row {{ $errors->has('tel') ? ' has-error' : '' }}">
                                <label for="tel" class="col-md-2">
                                    Tel
                                </label>
                                <div class="col-md-10">
                                    <input id="tel" name="tel" class="form-control" value="{{ $display->tel or old('tel') }}">
                                    @if ($errors->has('tel'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tel') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="content-group form-group row {{ $errors->has('fax') ? ' has-error' : '' }}">
                                <label for="fax" class="col-md-2">
                                    Fax
                                </label>
                                <div class="col-md-10">
                                    <input id="fax" name="fax" class="form-control" value="{{ $display->fax or old('fax') }}">
                                    @if ($errors->has('fax'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fax') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('logo') ? 'has-error':'' }}">
                                <label for="logo" class="col-md-2">
                                    Logo
                                </label>
                                <div class="col-md-10">
                                    <input type="file" id="logo" name="logo" data-fileuploader-files='[
                                        @if(isset($logo) && count($logo))
                                            {
                                                "name":"{{ array_first($logo['name']) }}",
                                                "size":"{{ array_first($logo['size']) }}",
                                                "type":"{{ array_first($logo['type']) }}",
                                                "file":"/{{ array_first($logo['url']) . '?v=' . filemtime(array_first($logo['url'])) }}"
                                            }
                                        @endif ]'>
                                    @if($errors->has('logo'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('logo')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('display_image') ? 'has-error':'' }}">
                                <label for="display_image" class="col-md-2">
                                    Display Image
                                </label>
                                <div class="col-md-10">
                                    <input type="file" id="display_image" name="display_image" data-fileuploader-files='[
                                        @if(isset($display_image) && count($display_image))
                                            {
                                                "name":"{{ array_first($display_image['name']) }}",
                                                "size":"{{ array_first($display_image['size']) }}",
                                                "type":"{{ array_first($display_image['type']) }}",
                                                "file":"/{{ array_first($display_image['url']) . '?v=' . filemtime(array_first($display_image['url'])) }}"
                                            }
                                        @endif ]'>
                                    @if($errors->has('display_image'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('display_image')}}</strong>
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

@section('scripts')
    <script src="{{ asset('js/jquery.fileuploader.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('input[name="logo"]').fileuploader({
                limit:1,
                extensions: ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'],
                theme: 'thumbnails',
                enableApi: true,
                editor: {
                    cropper: {
                        minWidth: 100,
                        minHeight: 100,
                        showGrid: true
                    }
                },
                dialogs: {
                    alert:function(e) {
                        return swal({
                            title:e,
                            type: "warning",
                            timer:2500
                        })
                    },
                    confirm:function(e,n) {
                        n();
                    }
                },
                captions: {
                    button: function(options) { return '選擇圖檔'; },
                    feedback: function(options) { return '選擇需上傳的圖檔'; },
                    feedback2: function(options) { return options.length + ' ' + (options.length > 1 ? '張圖檔' : '張圖檔') + '已選擇'; },
                    confirm: '確認',
                    cancel: '取消',
                    name: '檔名',
                    type: '類型',
                    size: '大小',
                    dimensions: '尺寸',
                    duration: 'Duration',
                    crop: '裁切',
                    rotate: '旋轉',
                    download: '下載',
                    remove: '移除',
                    drop: '將需選擇的圖檔拖曳到此',
                    paste: '<div class="fileuploader-pending-loader"><div class="left-half" style="animation-duration: ${ms}s"></div><div class="spinner" style="animation-duration: ${ms}s"></div><div class="right-half" style="animation-duration: ${ms}s"></div></div> Pasting a file, click here to cancel.',
                    removeConfirmation: '確認要移除這張圖檔嗎?',
                    errors: {
                        filesLimit: '上傳只能選擇${limit}個圖檔',
                        filesType: '上傳只支援JPG、JPEG、PNG格式',
                        fileSize: '${name}檔案過大，請確認檔案不能超過${fileMaxSize}MB.',
                        filesSizeAll: '所有上傳的圖檔不能超過${maxSize} MB.',
                        fileName: '這個圖檔${name}，已經被選取了',
                        folderUpload: '尚未設置上傳的檔案路徑'
                    }
                }
            });

            $('input[name="display_image"]').fileuploader({
                limit:1,
                extensions: ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'],
                theme: 'thumbnails',
                enableApi: true,
                editor: {
                    cropper: {
                        minWidth: 100,
                        minHeight: 100,
                        showGrid: true
                    }
                },
                dialogs: {
                    alert:function(e) {
                        return swal({
                            title:e,
                            type: "warning",
                            timer:2500
                        })
                    },
                    confirm:function(e,n) {
                        n();
                    }
                },
                captions: {
                    button: function(options) { return '選擇圖檔'; },
                    feedback: function(options) { return '選擇需上傳的圖檔'; },
                    feedback2: function(options) { return options.length + ' ' + (options.length > 1 ? '張圖檔' : '張圖檔') + '已選擇'; },
                    confirm: '確認',
                    cancel: '取消',
                    name: '檔名',
                    type: '類型',
                    size: '大小',
                    dimensions: '尺寸',
                    duration: 'Duration',
                    crop: '裁切',
                    rotate: '旋轉',
                    download: '下載',
                    remove: '移除',
                    drop: '將需選擇的圖檔拖曳到此',
                    paste: '<div class="fileuploader-pending-loader"><div class="left-half" style="animation-duration: ${ms}s"></div><div class="spinner" style="animation-duration: ${ms}s"></div><div class="right-half" style="animation-duration: ${ms}s"></div></div> Pasting a file, click here to cancel.',
                    removeConfirmation: '確認要移除這張圖檔嗎?',
                    errors: {
                        filesLimit: '上傳只能選擇${limit}個圖檔',
                        filesType: '上傳只支援JPG、JPEG、PNG格式',
                        fileSize: '${name}檔案過大，請確認檔案不能超過${fileMaxSize}MB.',
                        filesSizeAll: '所有上傳的圖檔不能超過${maxSize} MB.',
                        fileName: '這個圖檔${name}，已經被選取了',
                        folderUpload: '尚未設置上傳的檔案路徑'
                    }
                }
            });
        });
    </script>
@endsection