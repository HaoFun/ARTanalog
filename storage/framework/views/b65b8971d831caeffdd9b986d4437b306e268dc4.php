

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.fileuploader.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.fileuploader-theme-thumbnails.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>Update Tag</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo e(route('admin.tag.update', $tag->id)); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PATCH')); ?>

                            <div class="form-group row" <?php echo e($errors->has('parent_id') ? ' has-error' : ''); ?>>
                                <label for="parent_id" class="col-md-2">
                                    Parent ID
                                </label>
                                <div class="col-md-10">
                                    <select class="form-control m-b" name="parent_id">
                                        <option value="">Empty</option>
                                        <?php if(count($tags)): ?>
                                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($value->id === $tag->id): ?>
                                                        <?php continue; ?>
                                                    <?php endif; ?>
                                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->name_cn . '  [' . ($loop->parent->index + 1) . ']'); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php if($errors->has('parent_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('parent_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('name_cn') ? ' has-error' : ''); ?>">
                                <label for="name_cn" class="col-md-2">
                                    Name CN
                                </label>
                                <div class="col-md-10">
                                    <input id="name_cn" type="text" class="form-control" name="name_cn" placeholder="Name CN" value="<?php echo e(isset($tag->name_cn) ? $tag->name_cn : old('name_cn')); ?>" required autofocus>
                                    <?php if($errors->has('name_cn')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name_cn')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('name_en') ? ' has-error' : ''); ?>">
                                <label for="name_en" class="col-md-2">
                                    Name EN
                                </label>
                                <div class="col-md-10">
                                    <input id="name_en" type="text" class="form-control" name="name_en" placeholder="Name EN" value="<?php echo e(isset($tag->name_en) ? $tag->name_en : old('name_en')); ?>" required>
                                    <?php if($errors->has('name_en')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name_en')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('name_jp') ? ' has-error' : ''); ?>">
                                <label for="name_jp" class="col-md-2">
                                    Name JP
                                </label>
                                <div class="col-md-10">
                                    <input id="name_jp" type="text" class="form-control" name="name_jp" placeholder="Name JP" value="<?php echo e(isset($tag->name_jp) ? $tag->name_jp : old('name_jp')); ?>" required>
                                    <?php if($errors->has('name_jp')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name_jp')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('content_cn') ? ' has-error' : ''); ?>">
                                <label for="content_cn" class="col-md-2">
                                    Content CN
                                </label>
                                <div class="col-md-10">
                                    <textarea id="content_cn" name="content_cn" class="form-control"><?php echo isset($tag->content_cn) ? $tag->content_cn : old('content_cn'); ?></textarea>
                                    <?php if($errors->has('content_cn')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('content_cn')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('content_en') ? ' has-error' : ''); ?>">
                                <label for="content_en" class="col-md-2">
                                    Content EN
                                </label>
                                <div class="col-md-10">
                                    <textarea id="content_en" name="content_en" class="form-control"><?php echo isset($tag->content_en) ? $tag->content_en : old('content_en'); ?></textarea>
                                    <?php if($errors->has('content_en')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('content_en')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('content_jp') ? ' has-error' : ''); ?>">
                                <label for="content_jp" class="col-md-2">
                                    Content JP
                                </label>
                                <div class="col-md-10">
                                    <textarea id="content_jp" name="content_jp" class="form-control"><?php echo isset($tag->content_jp) ? $tag->content_jp : old('content_jp'); ?></textarea>
                                    <?php if($errors->has('content_jp')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('content_jp')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group <?php echo e($errors->has('icon') ? 'has-error':''); ?>">
                                <label for="icon" class="col-md-2">
                                    Icon
                                </label>
                                <div class="col-md-10">
                                    <input type="file" name="icon" data-fileuploader-files='[
                                        <?php if(count($icon)): ?>
                                            {
                                                "name":"<?php echo e(array_first($icon['name'])); ?>",
                                                "size":"<?php echo e(array_first($icon['size'])); ?>",
                                                "type":"<?php echo e(array_first($icon['type'])); ?>",
                                                "file":"/<?php echo e(array_first($icon['url']) . '?v=' . filemtime(array_first($icon['url']))); ?>"
                                            }
                                        <?php endif; ?> ]'>
                                    <?php if($errors->has('icon')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('icon')); ?></strong>
                                        </span>
                                    <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/jquery.fileuploader.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('input[name="icon"]').fileuploader({
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>