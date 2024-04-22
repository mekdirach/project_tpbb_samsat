<!DOCTYPE html>
<html>
<head>
	<title>Export Laporan Registrasi</title>
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
                <th class="text-center">Nomor Objek Pajak</th>
                <th class="text-center">Nomor Rekening</th>
                <th class="text-center">Nama Nasabah</th>
                <th class="text-center">Tgl. Registrasi</th>
                <th class="text-center">Tgl. Awal Blokir</th>
                <th class="text-center">Tgl. Rencana Bayar</th>
                <th class="text-center">Tgl. Akhir Blokir</th>
                <th class="text-center">Jumlah Bulan</th>
                <th class="text-center">Nominal Blokiran Berkala</th>
                <th class="text-center">Notifikasi</th>
                <th class="text-center">No. Hp</th>
                <th class="text-center">Alamat Email</th>
                <th class="text-center">Reference Number</th>
                <th class="text-center">Kode Kantor Operasional</th>
                <th class="text-center">UserID UIM</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($row->pbb_c_nop); ?></td>
                <td><?php echo e($row->pbb_c_src_extacc); ?></td>
                <td><?php echo e($row->pbb_c_nop_name); ?></td>
                <td><?php echo e($row->pbb_c_reg_date); ?></td>
                <td><?php echo e($row->pbb_c_autoblokir_awal_tgl); ?></td>
                <td><?php echo e($row->pbb_c_pajak_tgl_rencana_bayar); ?></td>
                <td><?php echo e($row->pbb_c_autoblokir_akhir_tgl); ?></td>
                <td><?php echo e($row->pbb_c_jumlah_periode); ?></td>
                <td><?php echo e($row->pbb_c_nominal_setoran); ?></td>
                <td><?php echo e($row->status_inputan); ?></td>
                <td><?php echo e($row->pbb_c_phone); ?></td>
                <td><?php echo e($row->pbb_c_mail); ?></td>
                <td><?php echo e($row->reference_number); ?></td>
                <td><?php echo e($row->pbb_c_created_office); ?></td>
                <td><?php echo e($row->pbb_c_created_by); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>

</body>
</html>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/exports/pdf/laporan-pendaftaran.blade.php ENDPATH**/ ?>