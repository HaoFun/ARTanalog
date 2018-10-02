<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img src="<?php echo e(asset('images/LOGO.png')); ?>" alt="LOGO">
                    </a>
                </div>
                <div class="logo-element">
                    AL
                </div>
            </li>

            <li class="<?php echo e(isActiveRoute('admin.display')); ?>">
                <a href="<?php echo e(route('admin.display.edit')); ?>"><i class="fa fa-building fa-lg"></i> <span class="nav-label">Display</span></a>
            </li>

            <li class="<?php echo e(isActiveRoute('admin.user')); ?>">
                <a href="<?php echo e(route('admin.user.index')); ?>"><i class="fa fa-user-o fa-lg"></i> <span class="nav-label">User</span></a>
            </li>

            <li class="<?php echo e(isActiveRoute('admin.news')); ?>">
                <a href="<?php echo e(route('admin.news.index')); ?>"><i class="fa fa-newspaper-o fa-lg"></i> <span class="nav-label">News</span></a>
            </li>

            <li class="<?php echo e(isActiveRoute('admin.tag')); ?>">
                <a href="<?php echo e(route('admin.tag.index')); ?>"><i class="fa fa-th-list fa-lg"></i> <span class="nav-label">Tag</span></a>
            </li>

            <li class="<?php echo e(isActiveRoute('admin.product')); ?>">
                <a href="<?php echo e(route('admin.product.index')); ?>"><i class="fa fa-cubes fa-lg"></i> <span class="nav-label">Product</span></a>
            </li>
        </ul>
    </div>
</nav>
