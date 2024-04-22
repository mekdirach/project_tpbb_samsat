<table>
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
</table>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/exports/excel/laporan-pendaftaran.blade.php ENDPATH**/ ?>