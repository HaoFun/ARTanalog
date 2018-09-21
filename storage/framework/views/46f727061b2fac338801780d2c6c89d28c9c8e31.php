<?php $__env->startSection('title', 'Login page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>Login</h5>
                    </div>
                    <div class="panel-body">
                        <form class="m-t" role="form" method="POST" action="<?php echo e(route('admin.login.action')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <input type="text" name="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="Name or Email" required autofocus>
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <a href="<?php echo e(route('admin.password.request')); ?>">
                                <h3>Forgot password?</h3>
                            </a>

                            <div class="form-group col-md-6 col-md-offset-3">
                                <p class="text-muted text-center">
                                    <small>Do not have an account?</small>
                                </p>
                                <a class="btn btn-sm btn-danger btn-block" href="<?php echo e(route('admin.register')); ?>">Create an account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>