<table>
	<tr>
		<th class="text-center">No.</th>
        <th class="text-center">Nomor Polisi</th>
        <th class="text-center">Nomor Rekening</th>
        <th class="text-center">Nama Pemilik</th>
        <th class="text-center">Provinsi</th>
        <th class="text-center">Tgl. Pembatalan</th>
        <th class="text-center">Tahun Pajak</th>
        <th class="text-center">Nominal</th>
        <th class="text-center">Kode Kantor Operasional</th>
	</tr>
	@foreach($records as $row)
	<tr>
		<td>{{ $loop->iteration }}</td>
        <td>{{ $row->nomor_polisi }}</td>
        <td>{{ $row->rekening_external }}</td>
        <td>{{ $row->nm_pemilik }}</td>
        <td>{{ $row->mp_mp_nama }}</td>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->tahun_pajak }}</td>
        <td>{{ $row->pajak_total_tagihan }}</td>
        <td>{{ $row->created_office }}</td>
	</tr>
	@endforeach
</table>
