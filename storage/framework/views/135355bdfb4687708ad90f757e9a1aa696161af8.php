<h4 class="media align-items-center font-weight-bold py-3 mb-2">
    <div class="media-body ml-3">
    <?php $__currentLoopData = Session::get('menus'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $menu['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(request()->segment(2) == $child['slug']): ?>
                <?php echo e($child['description']); ?>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(request()->segment(1) == $menu['slug'] && request()->segment(1) == 'dashboard'): ?>
            <?php echo e($menu['description']); ?>

        <?php elseif(request()->segment(1) == $menu['slug']): ?>
            <div class="text-muted text-tiny mt-1"><small class="font-weight-normal"><?php echo e($menu['description']); ?></small></div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</h4>

<hr class="container-m--x mt-0 mb-4">
<?php if(request()->segment(4)): ?>
    <?php $__currentLoopData = session('menus'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $menu['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(request()->segment(2) == $child['slug']): ?>
                <div class="row justify-content-end mr-1 mb-2">
                    <a href="<?php echo e(url('/' . $menu['slug'] . '/' . $child['slug'])); ?>" class="btn btn-secondary"><i class="ion ion-md-arrow-round-back mr-1"></i> Kembali</a>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/layouts/header-content.blade.php ENDPATH**/ ?>