<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTanaLog - <?php echo $__env->yieldContent('title'); ?> </title>
    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/sweetalert.css'); ?>" />
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
    <div id="wrapper">
        <?php echo $__env->make('layouts.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div id="page-wrapper" class="gray-bg">
            <?php echo $__env->make('layouts.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/sweetalert.min.js'); ?>" type="text/javascript"></script>
    <script>
        function ConfirmDelete(node) {
            swal({
                    title: "確認要刪除嗎?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#1ab394",
                    confirmButtonText: "刪除",
                    cancelButtonText: "取消",
                    closeOnConfirm: true
                },
                function() {
                    node.parentNode.submit();
                });
        }
    </script>
    <?php $__env->startSection('scripts'); ?>
    <?php echo $__env->yieldSection(); ?>
</body>
</html>
