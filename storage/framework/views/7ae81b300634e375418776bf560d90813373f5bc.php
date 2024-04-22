<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="<?php echo e(asset('img/Logo.png')); ?>" alt="">
        </span>

        <a href="<?php echo e(route('dashboard')); ?>" class="app-brand-text demo sidenav-text font-weight-bold ml-2"><?php echo e(Session::get('navs')); ?></a>
        <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>

    <div class="sidenav-divider mt-0"></div>

    <!-- Links -->
    <ul class="sidenav-inner py-1">

        <!-- Dashboards -->

        <?php $__currentLoopData = Session::get('menus'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(intval($menu['type']) == 3): ?>
            <li class="sidenav-item <?php echo e(request()->segment(1) == $menu['slug'] ? 'active' : ''); ?>">
                <a href="<?php echo e(URL::to('/') . '/' . $menu['slug']); ?>" class="sidenav-link"><i
                        class="sidenav-icon <?php echo e($menu['icon']); ?>"></i>
                    <div><?php echo e($menu['name']); ?></div>
                </a>
            </li>

	    <!-- <div class="sidenav-divider mt-0"></div> -->

        <?php else: ?>
            <li class="sidenav-item <?php echo e(request()->segment(1) == $menu['slug'] ? 'open active' : ''); ?>">
                <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i
                        class="sidenav-icon <?php echo e($menu['icon']); ?>"></i>
                    <div><?php echo e($menu['name']); ?></div>
                </a>

                <ul class="sidenav-menu">
                    <?php $__currentLoopData = $menu['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="sidenav-item <?php echo e(request()->segment(2) == $child['slug'] ? 'active' : ''); ?>">
                        <a href="<?php echo e(URL::to('/') . '/' . $menu['slug'] . '/' . $child['slug']); ?>" class="sidenav-link">
                            <div><?php echo e($child['name']); ?></div>
                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/layouts/includes/sidenav.blade.php ENDPATH**/ ?>