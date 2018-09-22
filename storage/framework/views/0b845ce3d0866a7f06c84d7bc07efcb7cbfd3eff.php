<?php $__env->startSection('title', 'User main page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <label for="" class="col-md-3">
                            <h3>User List</h3>
                        </label>
                        <div class="col-md-offset-6 col-md-3">
                            <a href="<?php echo e(route('admin.user.create')); ?>" type="button" class="btn btn-block btn-primary pull-right">Create User</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">Create at</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo e($user->created_at->toDateString()); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($user->name); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($user->email); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($user->is_action ? 'checked' : 'unCheck'); ?>

                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.user.edit', $user->id)); ?>" type="button" class="btn form-control btn-success">Edit</a>
                                        <form action="<?php echo e(route('admin.user.destroy', $user->id)); ?>" method="post">
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo e(csrf_field()); ?>

                                            <button class="btn form-control btn-danger" type="submit">Delete</button>
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