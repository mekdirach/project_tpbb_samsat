<?php $__env->startSection('content'); ?>
<?php
    $alert = Session::get('alert-type');
    $message = Session::get('message');
?>
<div class="authentication-wrapper authentication-3">
    <div class="authentication-inner">

        <!-- Side container -->
        <!-- Do not display the container on extra small, small and medium screens -->
        <div class="d-none d-lg-flex col-lg-8 align-items-center ui-bg-cover ui-bg-overlay-container p-5"
            style="background-image: url('img/bg/bg-login.png');">
            <div class="ui-bg-overlay bg-dark opacity-50"></div>
        </div>
        <!-- / Side container -->

        <!-- Form container -->
        <div class="d-flex col-lg-4 align-items-center bg-white p-5">
            <!-- Inner container -->
            <!-- Have to add `.d-flex` to control width via `.col-*` classes -->
            <div class="d-flex col-sm-7 col-md-5 col-lg-12 px-0 px-xl-4 mx-auto">
                <div class="w-100">

                    <!-- Logo -->
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="ui-w-70">
                            <div class="w-100 position-relative text-center">
                                <img class="w-50 h-50" src="<?php echo e(asset('img/logo-bjb.png')); ?>" alt="Logo BJB" >
                            </div>
                        </div>
                    </div>
                    <!-- / Logo -->

                    <h5 class="text-center mt-2 mb-5">Menabung Pajak</h5>

                    <?php if($alert == 'danger'): ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong><?php echo $message; ?></strong>
                        </div>
                    <?php endif; ?>

                    <!-- Form -->
                    <form class="my-3" action="<?php echo e(route('login.process')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="d-flex justify-content-end align-items-end m-0">
                            <button type="submit" class="btn btn-outline-primary rounded-pill">Sign In</button>
                            
                        </div>
                    </form>
                    <!-- / Form -->

                </div>
            </div>
        </div>
        <!-- / Form container -->

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/auth/login.blade.php ENDPATH**/ ?>