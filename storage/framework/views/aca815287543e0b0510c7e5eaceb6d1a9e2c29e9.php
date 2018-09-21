<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <?php if(Auth::guest()): ?>
                <li><a href="<?php echo e(route('admin.login')); ?>"><i class="fa fa-sign-in fa-fw"></i><b>Login</b></a></li>
            <?php elseif(Auth::check()): ?>
                <li>
                    <a class="text-center" href="<?php echo e(route('admin.logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i><b>Logout</b></a>
                    <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
