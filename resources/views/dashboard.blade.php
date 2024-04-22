@extends('layouts.app')
@section('content')
    <h4 class="media align-items-center font-weight-bold py-3 mb-4">
        <div class="media-body ml-3">
            Welcome, {{ ucwords(Session::get('user')->nama) }}
        </div>
    </h4>

    <hr class="container-m--x mt-0 mb-4">

    <div class="row">
        <div class="d-flex col-xl-12 align-items-stretch">

            <!-- Stats + Links -->
            <div class="card d-flex w-100 mb-4">
                <div class="row no-gutters row-bordered row-border-light h-100">
                    <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">

                        <a href="/reporting/laporan-pendaftaran" class="card-body media align-items-center text-dark">
                            <i class="lnr lnr-chart-bars display-4 d-block text-primary"></i>
                            <span class="media-body d-block ml-2">
                                <span class="text-big ">Tabungan Terdaftar</span><br>
                                <small class="font-weight-bolder" id="tabungan_terdaftar"
                                    style="font-size: 22px;"></small><span class="font-weight-bolder"
                                    style="font-size: 22px;">
                                    Rekening</span><br>
                                <small class="text"> Sampai dengan tanggal [ <span class="font-weight font-weight-bolder"
                                        id="sampai_tanggal_terdaftar">
                                    </span> ]</small>
                            </span>
                        </a>

                    </div>
                    <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">

                        <a href="/pbb/daftar-tpbb" class="card-body media align-items-center text-dark ">
                            <i class="lnr lnr-hourglass
                            display-4 d-block text-primary"></i>
                            <span class="media-body d-block ml-3">
                                <span class="text-big"><span>Tabungan Aktif</span> </span><br>
                                <small class="font-weight-bolder" id="tabungan_aktif" style="font-size: 22px;"></small><span
                                    class="font-weight-bolder" style="font-size: 22px;">
                                    Rekening</span><br>
                                <small class="text"> Sampai dengan tanggal [ <span class="font-weight-bolder"
                                        id="sampai_tanggal_aktif">
                                    </span> ]</small>
                            </span>
                        </a>

                    </div>
                    <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">

                        <a href="/reporting/laporan-transaksi-sukses" class="card-body media align-items-center text-dark">
                            <i class="lnr lnr-checkmark-circle display-4 d-block text-primary"></i>
                            <span class="media-body d-block ml-3">
                                <span class="text-big"><span>Tabungan Lunas</span> </span><br>
                                <small class="font-weight-bolder" id="tabungan_lunas" style="font-size: 22px;"></small><span
                                    class="font-weight-bolder" style="font-size: 22px;">
                                    Rekening</span><br>
                                <small class="text"> Sampai dengan tanggal [ <span class="font-weight-bolder"
                                        id="sampai_tanggal_lunas">
                                    </span> ]</small>
                            </span>
                        </a>

                    </div>
                    <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">

                        <a href="/reporting/laporan-pembatalan" class="card-body media align-items-center text-dark">
                            <i class="lnr lnr-license display-4 d-block text-primary"></i>
                            <span class="media-body d-block ml-3">
                                <span class="text-big"><span>Pembatalan Tabungan</span> </span><br>
                                <small class="font-weight-bolder" id="tabungan_dibatalkan"
                                    style="font-size: 22px;"></small><span class="font-weight-bolder"
                                    style="font-size: 22px;">
                                    Rekening</span><br>
                                <small class="text"> Sampai dengan tanggal [ <span class="font-weight-bolder"
                                        id="sampai_tanggal_dibatalkan">
                                    </span> ]</small>

                            </span>
                        </a>

                    </div>
                </div>
            </div>
            <!-- / Stats + Links -->

        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('dashboard.data') }}",
                type: "GET",
                success: function(response) {
                    console.log();
                    $('#tabungan_terdaftar').text(response.tabungan_terdaftar);
                    $('#tabungan_aktif').text(response.tabungan_aktif);
                    $('#tabungan_dibatalkan').text(response.tabungan_dibatalkan);
                    $('#tabungan_lunas').text(response.tabungan_lunas);
                    $('#sampai_tanggal_terdaftar').text(response.sampai_tanggal_terdaftar);
                    $('#sampai_tanggal_lunas').text(response.sampai_tanggal_lunas);
                    $('#sampai_tanggal_dibatalkan').text(response.sampai_tanggal_dibatalkan);
                    $('#sampai_tanggal_aktif').text(response.sampai_tanggal_aktif);
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika ada
                    console.error(error);
                }
            });
        });
    </script>
@endpush
