<?php
$alert = Session::get('alert-type');
$message = Session::get('message');
?>
<?php if($alert == 'success'): ?>
<div class="alert alert-success alert-block d-print-none">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong><?php echo $message; ?></strong>
</div>
<?php endif; ?>


<?php if($alert == 'error'): ?>
<div class="alert alert-danger alert-block d-print-none">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong><?php echo $message; ?></strong>
</div>
<?php endif; ?>


<?php if($alert == 'warning'): ?>
<div class="alert alert-warning alert-block d-print-none">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong><?php echo $message; ?></strong>
</div>
<?php endif; ?>


<?php if($alert == 'info'): ?>
<div class="alert alert-info alert-block d-print-none">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong><?php echo $message; ?></strong>
</div>
<?php endif; ?>


<?php if($alert == 'danger'): ?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong><?php echo $message; ?></strong>
</div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger alert-block d-print-none">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<ul>
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li><?php echo e($error); ?></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</div>
<?php endif; ?>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/layouts/flash-message.blade.php ENDPATH**/ ?>