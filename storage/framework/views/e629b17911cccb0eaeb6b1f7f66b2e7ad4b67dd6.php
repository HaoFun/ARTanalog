<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="logo-element" style="padding: 0 0 0 0;">
                <a href="<?php echo e(route('admin.home')); ?>">
                    <img src="<?php echo e(asset('images/LOGO.png')); ?>" alt="LOGO">
                </a>
            </li>

            <li class="<?php echo e(isActiveRoute('admin.user')); ?>">
                <a href="<?php echo e(route('admin.user.index')); ?>"><i class="fa fa-address-book fa-lg"></i> <span class="nav-label">User</span></a>
            </li>

            <li class="<?php echo e(isActiveRoute('admin.news')); ?>">
                <a href=""><i class="fa fa-newspaper-o fa-lg"></i> <span class="nav-label">News</span></a>
            </li>
        </ul>
    </div>
</nav>
