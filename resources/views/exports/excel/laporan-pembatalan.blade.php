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
	@foreach($records as $row)
	<tr>
		<td>{{ $loop->iteration }}</td>
        <td>{{ $row->pbb_c_src_extacc }}</td>
        <td>{{ $row->pbb_c_nop }}</td>
        <td>{{ $row->mp_p_nama }}</td>
        <td>{{ $row->pbb_c_pembatalan }}</td>
        <td>{{ $row->pbb_c_reg_date }}</td>
        <td>{{ $row->pbb_c_amount }}</td>
        <td>{{ $row->pbb_c_created_office }}</td>
	</tr>
	@endforeach
</table>
