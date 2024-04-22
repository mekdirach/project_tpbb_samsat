<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/libs/datatables/datatables.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card card-primary card-outline card-outline-tabs col-sm-12">
        <div class="row">
            <div class="card-body col-12">
                <?php if(request()->segment(3) == 'show'): ?>
                    <?php echo $__env->make('management-app.parameter-sistem.content.detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make('management-app.parameter-sistem.content.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('vendor/libs/datatables/datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('js/tables_datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/libs/bootbox/bootbox.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.js')); ?>"></script>
    <script src="<?php echo e(asset('js/ui_modals.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/management-app/parameter-sistem/index.blade.php ENDPATH**/ ?>