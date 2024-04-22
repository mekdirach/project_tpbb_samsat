<!DOCTYPE html>
<html>
<head>
	<title>Export Daftar T-Samsat</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('app.css') }}">
	<link rel="stylesheet" href="{{ asset('main.css') }}">
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
		<h5>Export {{$detailPdf['judul']}}</h5>
		{{-- <h5>Periode : {{ $rangeDate->start_date }} sd {{ $rangeDate->end_date }}</h5> --}}
    </div>
  </div>

	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nomor Polisi</th>
                <th class="text-center">Nomor Rekening</th>
                <th class="text-center">Nama Pemilik</th>
                <th class="text-center">Tgl. Registrasi</th>
                <th class="text-center">Tgl. Awal Blokir</th>
                <th class="text-center">Tgl. Rencana Bayar</th>
                <th class="text-center">Tgl. Akhir Blokir</th>
                <th class="text-center">Jumlah Bulan</th>
                <th class="text-center">Nominal Blokiran Berkala</th>
                <th class="text-center">No. Hp</th>
                <th class="text-center">Alamat Email</th>
                <th class="text-center">Reference Number</th>
                <th class="text-center">Kode Kantor Operasional</th>
                <th class="text-center">UserID UIM</th>
            </tr>
		</thead>
		<tbody>
			@foreach($records as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->nomor_polisi }}</td>
                <td>{{ $row->rekeninf_external }}</td>
                <td>{{ $row->nm_pemilik }}</td>
                <td>{{ $row->registrasi_tgl }}</td>
                <td>{{ $row->autoblokir_awal_tgl }}</td>
                <td>{{ $row->pajak_tgl_rencana_bayar }}</td>
                <td>{{ $row->autoblokir_akhir_tgl }}</td>
                <td>{{ $row->jumlah_periode }}</td>
                <td>{{ $row->nominal_setoran }}</td>
                <td>{{ $row->notif_phone }}</td>
                <td>{{ $row->notif_email }}</td>
                <td>{{ $row->reference_number }}</td>
                <td>{{ $row->created_office }}</td>
                <td>{{ $row->created_by }}</td>
            </tr>
            @endforeach
		</tbody>
	</table>

</body>
</html>
