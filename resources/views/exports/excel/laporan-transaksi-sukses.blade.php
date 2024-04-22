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
	@foreach($records as $row)
	<tr>
		<td>{{ $loop->iteration }}</td>
        <td>{{ $row->pbb_c_src_extacc }}</td>
        <td>{{ $row->mp_mp_nama }}</td>
        <td>{{ $row->pbb_c_nop_name }}</td>
        <td>{{ $row->mp_mkk_nama }}</td>
        <td>{{ $row->pbb_c_tahun }}</td>
        <td>{{ $row->mp_pbb_tp_tgl_pembayaran }}</td>
        <td>{{ $row->mp_pbb_tp_total_amount }}</td>
        <td>{{ $row->pbb_c_amount }}</td>
        <td>{{ $row->mp_pbb_tp_admin_fee }}</td>
        <td>{{ $row->mp_pbb_tp_total_amount }}</td>
        <td>{{ $row->pbb_c_amount }}</td>
	</tr>
	@endforeach
</table>
