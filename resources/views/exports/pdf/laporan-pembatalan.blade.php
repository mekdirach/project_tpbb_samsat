<!DOCTYPE html>
<html>
<head>
	<title>Export Laporan Pembatalan Registrasi</title>
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
		<h5>Periode : {{ $rangeDate->start_date }} sd {{ $rangeDate->end_date }}</h5>
    </div>
  </div>

	<table class='table table-bordered table-striped'>
		<thead>
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
		</thead>
		<tbody>
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
		</tbody>
	</table>

</body>
</html>
