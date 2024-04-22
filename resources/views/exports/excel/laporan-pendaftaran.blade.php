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
	@foreach($records as $row)
	<tr>
		<td>{{ $loop->iteration }}</td>
        <td>{{ $row->pbb_c_nop }}</td>
        <td>{{ $row->pbb_c_src_extacc }}</td>
        <td>{{ $row->pbb_c_nop_name }}</td>
        <td>{{ $row->pbb_c_reg_date }}</td>
        <td>{{ $row->pbb_c_autoblokir_awal_tgl }}</td>
        <td>{{ $row->pbb_c_pajak_tgl_rencana_bayar }}</td>
        <td>{{ $row->pbb_c_autoblokir_akhir_tgl }}</td>
        <td>{{ $row->pbb_c_jumlah_periode }}</td>
        <td>{{ $row->pbb_c_nominal_setoran }}</td>
        <td>{{ $row->status_inputan }}</td>
        <td>{{ $row->pbb_c_phone }}</td>
        <td>{{ $row->pbb_c_mail }}</td>
        <td>{{ $row->reference_number }}</td>
        <td>{{ $row->pbb_c_created_office }}</td>
        <td>{{ $row->pbb_c_created_by }}</td>
	</tr>
	@endforeach
</table>
