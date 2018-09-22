<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTanaLog - <?php echo $__env->yieldContent('title'); ?> </title>
    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
    <div id="wrapper">
        <?php echo $__env->make('layouts.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div id="page-wrapper" class="gray-bg">
            <?php echo $__env->make('layouts.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>
    <?php $__env->startSection('scripts'); ?>
    <?php echo $__env->yieldSection(); ?>
</body>
</html>
