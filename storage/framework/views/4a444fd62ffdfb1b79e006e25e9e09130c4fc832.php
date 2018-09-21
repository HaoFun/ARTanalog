<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5>Register</h5>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="<?php echo e(route('admin.register.action')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>" required autofocus>
                            <?php if($errors->has('name')): ?>
                                <span class="help-block">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Password Confirm" name="password_confirmation" required>
                        </div>

                        <div class="form-group col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary btn-block">
                                Register
                            </button>
                        </div>

                        <div class="form-group col-md-6 col-md-offset-3">
                            <p class="text-muted text-center">
                                <small>Have an account?</small>
                            </p>
                            <a class="btn btn-sm btn-danger btn-block" href="<?php echo e(route('admin.login')); ?>">Login account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>