<!DOCTYPE html>
<html>
<head>
	<title>Export Laporan Blokir</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo e(asset('app.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('main.css')); ?>">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
  <div class="row justify-content-center">
    <div class="col-sm-12 text-center">
		<h5>Export <?php echo e($detailPdf['judul']); ?></h5>
		<h5>Periode : <?php echo e($rangeDate->start_date); ?> sd <?php echo e($rangeDate->end_date); ?></h5>
    </div>
  </div>

	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nomor Rekening</th>
                <th class="text-center">Nomor Objek Pajak</th>
                <th class="text-center">Kab / Kota</th>
                <th class="text-center">Tgl. Blokir</th>
                <th class="text-center">Nominal</th>
                <th class="text-center">Kode Kantor Operasional</th>
            </tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($row->mp_pbb_ab_src_extacc); ?></td>
                <td><?php echo e($row->mp_pbb_ab_nop); ?></td>
                <td><?php echo e($row->mp_p_nama); ?></td>
                <td><?php echo e($row->mp_pbb_ab_tgl_blokir); ?></td>
                <td><?php echo e($row->mp_pbb_ab_amount); ?></td>
                <td><?php echo e($row->pbb_c_created_office); ?></td>
            </tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>

</body>
</html>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/exports/pdf/laporan-blokir.blade.php ENDPATH**/ ?>