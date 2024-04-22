<table>
	<tr>
		<th class="text-center">No.</th>
        <th class="text-center">Nomor Rekening</th>
        <th class="text-center">Nomor Objek Pajak</th>
        <th class="text-center">Kab / Kota</th>
        <th class="text-center">Tgl. Blokir</th>
        <th class="text-center">Nominal</th>
        <th class="text-center">Kode Kantor Operasional</th>
	</tr>
	@foreach($records as $row)
	<tr>
		<td>{{ $loop->iteration }}</td>
        <td>{{ $row->mp_pbb_ab_src_extacc }}</td>
        <td>{{ $row->mp_pbb_ab_nop }}</td>
        <td>{{ $row->mp_p_nama }}</td>
        <td>{{ $row->mp_pbb_ab_tgl_blokir }}</td>
        <td>{{ $row->mp_pbb_ab_amount }}</td>
        <td>{{ $row->pbb_c_created_office }}</td>
	</tr>
	@endforeach
</table>
