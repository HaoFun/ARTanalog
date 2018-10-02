<?php $__env->startSection('title', 'Product main page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <label for="" class="col-md-3">
                            <h3>Product List</h3>
                        </label>
                        <div class="col-md-offset-6 col-md-3">
                            <a href="<?php echo e(route('admin.product.create')); ?>" type="button" class="btn btn-block btn-primary pull-right">Create Product</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">Create at</th>
                                <th class="text-center">Title CN</th>
                                <th class="text-center">Content CN</th>
                                <th class="text-center">Tag Name CN</th>
                                <th class="text-center">Action</th>
                            </tr>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo e($product->created_at->toDateString()); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($product->title_cn); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e(str_limit(strip_tags($product->content_cn), 30, '...')); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($product->tag->name_cn); ?>

                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.product.edit', $product->id)); ?>" type="button" class="btn btn-success form-control">Edit</a>
                                        <form action="<?php echo e(route('admin.product.destroy', $product->id)); ?>" method="post">
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo e(csrf_field()); ?>

                                            <button class="btn btn-danger form-control" type="button" onclick="ConfirmDelete(this)">Delete</button>
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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>