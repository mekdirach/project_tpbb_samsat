<table>
	<tr>
		<th class="text-center">No.</th>
        <th class="text-center">Nomor Rekening</th>
        <th class="text-center">Nomor Objek Pajak</th>
        <th class="text-center">Kab / Kota</th>
        <th class="text-center">Tgl. Pembatalan</th>
        <th class="text-center">Tahun Pajak</th>
        <th class="text-center">Nominal</th>
        <th class="text-center">Kode Kantor Operasional</th>
	</tr>
	<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($row->pbb_c_src_extacc); ?></td>
        <td><?php echo e($row->pbb_c_nop); ?></td>
        <td><?php echo e($row->mp_p_nama); ?></td>
        <td><?php echo e($row->pbb_c_pembatalan); ?></td>
        <td><?php echo e($row->pbb_c_reg_date); ?></td>
        <td><?php echo e($row->pbb_c_amount); ?></td>
        <td><?php echo e($row->pbb_c_created_office); ?></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/exports/excel/laporan-pembatalan.blade.php ENDPATH**/ ?>