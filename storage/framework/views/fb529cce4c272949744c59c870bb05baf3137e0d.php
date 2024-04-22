<table>
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
</table>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/exports/excel/laporan-transaksi-gagal.blade.php ENDPATH**/ ?>