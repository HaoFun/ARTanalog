<script type="text/javascript" src="<?php echo e(asset('vendor/ueditor/ueditor.config.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('vendor/ueditor/ueditor.all.js')); ?>"></script>
<script>
    window.UEDITOR_CONFIG.serverUrl = '<?php echo e(config('ueditor.route.name')); ?>'
</script>