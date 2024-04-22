<!DOCTYPE html>
<html>
<head>
	<title>Export Laporan Pembayaran</title>
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
                <th class="text-center">Provinsi</th>
                <th class="text-center">Nomor Objek Pajak</th>
                <th class="text-center">Kab/Kota</th>
                <th class="text-center">Tahun Pajak</th>
                <th class="text-center">Tgl. Pembayaran</th>
                <th class="text-center">Total Nominal Autodebet</th>
                <th class="text-center">Total Tagihan Pajak</th>
                <th class="text-center">Admin Fee</th>
                <th class="text-center">Total Pembayaran</th>
                <th class="text-center">Total Nominal Dikembalikan ke Rekening</th>
            </tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($row->pbb_c_src_extacc); ?></td>
                <td><?php echo e($row->mp_mp_nama); ?></td>
                <td><?php echo e($row->pbb_c_nop_name); ?></td>
                <td><?php echo e($row->mp_mkk_nama); ?></td>
                <td><?php echo e($row->pbb_c_tahun); ?></td>
                <td><?php echo e($row->mp_pbb_tp_tgl_pembayaran); ?></td>
                <td><?php echo e($row->mp_pbb_tp_total_amount); ?></td>
                <td><?php echo e($row->pbb_c_amount); ?></td>
                <td><?php echo e($row->mp_pbb_tp_admin_fee); ?></td>
                <td><?php echo e($row->mp_pbb_tp_total_amount); ?></td>
                <td><?php echo e($row->pbb_c_amount); ?></td>
            </tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>

</body>
</html>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/exports/pdf/laporan-transaksi-sukses.blade.php ENDPATH**/ ?>