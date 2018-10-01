<?php $__env->startSection('title', 'Tag main page'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/blueimp-gallery.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <label for="" class="col-md-3">
                            <h3>Tag List</h3>
                        </label>
                        <div class="col-md-offset-6 col-md-3">
                            <a href="<?php echo e(route('admin.tag.create')); ?>" type="button" class="btn btn-block btn-primary pull-right">Create Tag</a>
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
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo e(isset($tag->parent_id) ? $tag->tag->name_cn : null); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e(str_limit($tag->content_cn, 20, '...')); ?>

                                    </td>
                                    <td class="text-center">
                                        <div class="lightBoxGallery">
                                            <a href="<?php echo e(asset(array_first(unserialize(($tag->icon)))) . '?v=' . str_random('10')); ?>" data-gallery="">
                                                <img src="<?php echo e(asset(array_first(unserialize(($tag->icon)))) . '?v=' . str_random('10')); ?>" style="height: 64px; max-width: 100px">
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
                                        <a href="<?php echo e(route('admin.tag.edit', $tag->id)); ?>" type="button" class="btn btn-success form-control">Edit</a>
                                        <form action="<?php echo e(route('admin.tag.destroy', $tag->id)); ?>" method="post">
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo e(csrf_field()); ?>

                                            <button class="btn btn-danger form-control" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/jquery.blueimp-gallery.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>