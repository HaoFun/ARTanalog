<?php $__env->startSection('title', 'News main page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <label for="" class="col-md-3">
                            <h3>News List</h3>
                        </label>
                        <div class="col-md-offset-6 col-md-3">
                            <a href="<?php echo e(route('admin.news.create')); ?>" type="button" class="btn btn-block btn-primary pull-right">Create News</a>
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
                            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo e($item->created_at->toDateString()); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($item->title_cn); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e(str_limit(strip_tags($item->content_cn), 30, '...')); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($item->publish_at->toDateString()); ?>

                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.news.edit', $item->id)); ?>" type="button" class="btn btn-success">Edit</a>
                                        <form action="<?php echo e(route('admin.news.destroy', $item->id)); ?>" method="post" style=" display: inline;">
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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>