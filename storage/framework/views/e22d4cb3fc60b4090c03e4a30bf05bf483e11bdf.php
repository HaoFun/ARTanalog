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
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo e($tag->id); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($tag->parent_id); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($tag->name_cn); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e(str_limit(strip_tags($tag->content_cn), 30, '...')); ?>

                                    </td>
                                    <td class="text-center">
                                        <div class="lightBoxGallery">
                                            <?php if(file_exists(array_first(unserialize(($tag->icon))))): ?>
                                                <a href="<?php echo e(asset(array_first(unserialize(($tag->icon)))) . '?v=' . str_random('10')); ?>" data-gallery="">
                                                    <img src="<?php echo e(asset(array_first(unserialize(($tag->icon)))) . '?v=' . str_random('10')); ?>" style="height: 64px; max-width: 100px">
                                                </a>
                                            <?php endif; ?>
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
                                        <a href="<?php echo e(route('admin.tag.edit', $tag->id)); ?>" type="button" class="btn btn-success">Edit</a>
                                        <form action="<?php echo e(route('admin.tag.destroy', $tag->id)); ?>" method="post" style=" display: inline;">
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo e(csrf_field()); ?>

                                            <button class="btn btn-danger" type="button" onclick="ConfirmDelete(this)">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
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