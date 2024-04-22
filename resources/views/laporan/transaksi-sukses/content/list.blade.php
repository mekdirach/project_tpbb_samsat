<div class="card">
    <div class="card-header">
        <div id="accordion">
            <div class="row">
                <div class="col-md-6 text-left">
                    <a class="btn btn-primary" data-toggle="collapse" id="btn-accordion" href="#accordion-1"
                        aria-expanded="false" aria-controls="accordion-1">
                        <i class="ion ion-ios-search"></i> Cari
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-success" type="button" id="btnExport"><i class="fas fa-share-square"></i>
                        Export</button>
                </div>
            </div>

            <div id="accordion-1" class="collapse mt-2" data-parent="#accordion">

                @if (substr(Session::get('user')->kodeCabang, 0, 1) == 'D' || substr(Session::get('user')->kodeCabang, 0, 1) == 'd')
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <label class="col-form-label col-sm-4">Kantor Cabang</label>
                            <div class="col-sm-12">
                                <select class="custom-select" name="branch" id="branch">
                                    <option selected value="">- Pilih -</option>
                                    @foreach ($branch as $item)
                                        <option value="{{ $item->branch }}">{{ $item->branch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label col-sm-4">NOP</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nop" id="nop">
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-right">
                        <div class="col-6">
                            <label class="col-form-label col-sm-4">NOP</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nop" id="nop">
                                </div>
                            </div>
                        </div>
                        <div class="col-6" style="display: none;"></div>
                    </div>
                @endif


                <div class="row justify-content-center">
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Pemda</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="pemda" id="pemda">
                                <option selected value="">- Pilih -</option>
                                @foreach ($pemda as $item)
                                    <option value="{{ $item->mp_p_id }}">{{ $item->mp_p_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Nama Wajib Pajak</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Tanggal Transaksi</label>
                        <div class="col-sm-12">
                            <div class="input-daterange input-group">
                                <input type="text" class="form-control" name="start" id="start">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">s/d</span>
                                </div>
                                <input type="text" class="form-control" name="end" id="end">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Nomor Rekening</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="norek" id="norek">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-sm btn-primary" id="btnSearch"><i class="ion ion-ios-search"></i>
                            Cari</button>
                    </div>
                    <div class="col-sm-6 text-left">
                        <button class="btn btn-sm btn-warning" id="btnReset">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-datatable table-responsive">
        <table class="datatables-demos table table-striped table-bordered">
        </table>
    </div>


</div>

<div class="modal fade" id="modals-default">
    <div class="modal-dialog">
        <form action="{{ route('laporan.transaksi-sukses-exort') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title custom-title">Export
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="mBranch" id="mBranch">
                <input type="hidden" name="mNop" id="mNop">
                <input type="hidden" name="mPemda" id="mPemda">
                <input type="hidden" name="mNama" id="mNama">
                <input type="hidden" name="mNorek" id="mNorek">
                <input type="hidden" name="mStart" id="mStart">
                <input type="hidden" name="mEnd" id="mEnd">
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Tipe</label>
                        <select name="type" class="custom-select" id="type">
                            <option value="1">Excel</option>
                            <option value="2">PDF</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveBtn">Export</button>
            </div>
        </form>
    </div>
</div>
<br>

<div class="modal fade" id="modals-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
        <div class="modal-content" style=" max-height: 90vh;  border-radius: 15px;">
            <div style=" margin-top: 15px;
            margin-left: 110px;">
                <h5 class="modal-title custom-title " id="modalTitle">
                    Bukti Pembayaran</h5>

            </div>
            <div class="modal-body" style=" overflow-y: scroll;">

                <div class="coba" style=" max-height: 90vh; ">
                    <div style="margin-left: auto; margin-right: auto;">
                        <div class="form-group row" style="margin-top: 0; margin-bottom: 0;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 10px; font-weight: bold;">Informasi
                                Umum</label>
                        </div>

                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Kantor Cabang</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label name="kantor_cabang" id="kantor_cabang" class="col-form-label"
                                    style="font-family: Courier, monospace; font-size: 9px;"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">User ID</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="user_id" id="user_id"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Tanggal Cetak Ulang</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="tgl_cetak" id="tgl_cetak"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Jam Cetak Ulang</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="jam_cetak" id="jam_cetak"></label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group row mb-0">
                            <label class="col-sm-10 col-form-label"
                                style="font-family: Courier, monospace; font-size: 10px; font-weight: bold;">Informasi
                                Data Pajak Bumi & Bagunan</label>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">No. Transaksi Pemda</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="transaksi_pemda" id="transaksi_pemda"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">No. Transaksi Bank</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="transaksi_bank" id="transaksi_bank"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">No. Sequence</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="sequence" id="sequence"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Nomor Objek Pajak</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="objek_pajak" id="objek_pajak"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Nama Wajib Pajak</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="wajib_pajak" id="wajib_pajak"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Provinsi</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="provinsi" id="provinsi"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Kota/Kabupaten</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="kota" id="kota"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Kelurahan</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="kelurahan" id="kelurahan"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Kecamatan</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="kecamatan" id="kecamatan"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Luas Tanah</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="luas_tanah" id="luas_tanah"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Luas Bangunan</label>
                            <label class="col-sm-1 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="luas_bagunan" id="luas_bagunan"></label>
                            </div>
                        </div>

                    </div>
                    <div>
                        <div class="form-group row mb-0">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size:10px; font-weight: bold;">Uraian
                                Pembayaran</label>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Produk Pajak PBB-P2</label>
                            <label class="col-sm-2 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">: Rp</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="pajak_pbb" id="pajak_pbb"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Denda</label>
                            <label class="col-sm-2 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">: Rp</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="denda" id="denda"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Diskon/ Potongan</label>
                            <label class="col-sm-2 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">: Rp</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="diskon" id="diskon"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Biaya Admin</label>
                            <label class="col-sm-2 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">: Rp</label>
                            <div class="col-sm-4">
                                <label class="col-form-label" style="font-family: Courier, monospace; font-size: 9px;"
                                    name="biaya_admin" id="biaya_admin"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Total Pembayaran</label>
                            <label class="col-sm-2 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">: Rp</label>
                            <div class="col-sm-4">
                                <label class="col-form-label"
                                    style="font-family: Courier, monospace; font-size: 9px; bold;"
                                    name="total_pembayaran" id="total_pembayaran"></label>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-left: 0.5cm;">
                            <label class="col-sm-6 col-form-label"
                                style="font-family: Courier, monospace; font-size: 9px;">Terbilang</label>
                            <label class="col-sm-2 col-form-label text-center"
                                style="font-family: Courier, monospace; font-size: 9px;">: Rp</label>
                            <div class="col-sm-4">
                                <label class="col-form-label"
                                    style="font-family: Courier, monospace; font-size: 9px; bold;" name="terbilang"
                                    id="terbilang"></label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div style="margin-bottom: 10px; margin-left: 115px; ">
                <button type="submit" class="btn btn-primary" id="saveBtn"
                    style=" margin-right: 80px; font-family: Courier, monospace; font-size: 9px;"><i
                        class="lnr lnr-printer d-block"> Cetak Bukti
                        Pembayaran</i></button>
            </div>
        </div>

    </div>
</div>
</div>


<style>
    /*   .modal {}

    .modal-dialog {
        width: 30% !important;
        max-height: 60% !important;
    }

    .modal-content {
        overflow-y: hidden !important;
    }

    .modal-body {
        overflow-y: auto !important;
    }*/
</style>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            loadData()

            $('#btn-accordion').click(function() {
                if ($('#accordion-1').hasClass('show')) {
                    $(this).html('<i class="ion ion-ios-search"></i> Cari');
                    $(this).removeClass('btn-danger').addClass('btn-primary');
                } else {
                    $(this).html('<i class="ion ion-md-remove-circle-outline"></i> Tutup');
                    $(this).removeClass('btn-primary').addClass('btn-danger');
                }
            });

            $('#btnSearch').on('click', function() {
                $('.datatables-demos').DataTable().clear().destroy()
                loadData()
            })

            $('#btnReset').on('click', function() {
                $("#branch").val('')
                $('#nop').val('')
                $('#pemda').val('')
                $('#nama').val('')
                $('#norek').val('')
                $('#start').val('')
                $('#end').val('')
                $('.datatables-demos').DataTable().clear().destroy()
                loadData()
            })

            $('#btnExport').on('click', function() {
                $('#modals-default').modal('show')
                $('#mBranch').val($('#branch').val())
                $('#mNop').val($('#nop').val())
                $('#mPemda').val($('#pemda').val())
                $('#mNama').val($('#nama').val())
                $('#mNorek').val($('#norek').val())
                $('#mStart').val($('#start').val())
                $('#mEnd').val($('#end').val())
            })

            $('#start').datepicker()
            $('#end').datepicker()
        });

        function loadData() {
            $('.datatables-demos').dataTable({
                serverSide: true,
                paging: true,
                ordering: false,
                searching: false,
                responsive: true,
                processing: true,
                bDestroy: true,
                buttons: [],
                oLanguage: {
                    oPaginate: {
                        sFirst: "Halaman Pertama",
                        sPrevious: "Sebelumnya",
                        sNext: "Selanjutnya",
                        sLast: "Halaman Terakhir"
                    }
                },
                ajax: {
                    url: "{{ route('laporan.transaksi-sukses-list') }}",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        branch: $('#branch').val(),
                        nop: $('#nop').val(),
                        pemda: $('#pemda').val(),
                        nama: $('#nama').val(),
                        norek: $('#norek').val(),
                        start_date: $('#start').val(),
                        end_date: $('#end').val(),
                    }

                },
                columns: [{
                        title: "No",
                        width: "3%",
                        data: 'rownum',
                        mRender: function(data, type, row) {
                            return row.rownum;
                        }
                    },
                    {
                        title: "Nama Pemda",
                        width: "5%",
                        data: 'mp_p_nama',
                    },
                    {
                        title: "NOP",
                        width: "5%",
                        data: 'pbb_c_nop',
                    },
                    {
                        title: "Nama Wajib Pajak",
                        width: "9%",
                        data: 'pbb_c_nop_name',
                    },
                    {
                        title: "Nomor Rekening",
                        width: "5%",
                        data: 'pbb_c_src_extacc',
                    },
                    {
                        title: "Jumlah Transaksi",
                        data: 'mp_pbb_tp_total_amount',
                        width: "7%",
                        mRender: function(data, type, row) {
                            var result = `Rp ${(data)}`
                            return result
                        }
                    },
                    {
                        title: "Tanggal Transaksi",
                        data: 'mp_pbb_tp_tgl_pembayaran',
                        width: "10%",
                    },
                    {
                        title: "Aksi",
                        data: 'pbb_c_nop',
                        width: "2%",
                        mRender: function(data, type, row) {
                            var html
                            html =
                                `<a href="javascript:void(0)" title="Detail" type="button" class="btn btn-sm btn-outline-secondary" onclick="modalView('${row.pbb_c_nop}')"><i class="ion ion-md-eye"></i></a>`
                            return html
                        }
                    },
                ]
            });
        }

        function modalView(id) {
            $('#modals-view').modal('show')
            $('#status').attr('disabled', false);
            edit = true
            console.log(id);
            $.ajax({
                url: "{{ route('laporan.transaksi-sukses-detail') }}",
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: id
                },

                success: function(data) {
                    console.log(data);
                    var dbDateTime = data.mp_pbb_tp_tgl_pembayaran;
                    var parts = dbDateTime.split(" ");
                    var tanggal = parts[0]; // tanggal
                    var waktu = parts[1];
                    var angka = data.mp_pbb_tp_total_amount;
                    console.log(angka);
                    var terbilang = terbilang_huruf(angka);
                    $('.modalTitle').html('Bukti Pembayaran ')
                    $('#kantor_cabang').text(data.mp_mkk_nama)
                    $('#user_id').text(data.mp_p_id)
                    $('#tgl_cetak').text(tanggal)
                    $('#jam_cetak').text(waktu)
                    $('#transaksi_pemda').text(data.mp_pbb_tp_settle_date)
                    $('#transaksi_bank').text(data.mp_pbb_tp_settle_date)
                    $('#sequence').text(data.mp_pbb_tp_settle_date)
                    $('#objek_pajak').text(data.mp_pbb_tp_ntb)
                    $('#wajib_pajak').text(data.pbb_c_nop_name)
                    $('#provinsi').text(data.mp_mp_nama)
                    $('#kota').text(data.mp_mkk_nama)
                    $('#kelurahan').text(data.pbb_c_kelurahan)
                    $('#kecamatan').text(data.pbb_c_kecamatan)
                    $('#luas_tanah').text(data.pbb_c_luas_tanah)
                    $('#luas_bagunan').text(data.pbb_c_luas_bangunan)
                    $('#pajak_pbb').text(data.pbb_c_amount)
                    $('#denda').text(data.mp_pbb_tp_admin_fee)
                    $('#diskon').text(data.mp_pbb_tp_diskon)
                    $('#biaya_admin').text(data.mp_pbb_tp_admin_fee)
                    $('#total_pembayaran').text(data.mp_pbb_tp_total_amount)
                    $('#terbilang').text(terbilang)
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        function terbilang_huruf(angka) {
            if (typeof angka === 'number') {
                var bilangan = [
                    '', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh',
                    'sebelas'
                ];
                if (angka < 12) {
                    return bilangan[angka];
                } else if (angka < 20) {
                    return bilangan[angka - 10] + ' belas';
                } else if (angka < 100) {
                    return bilangan[Math.floor(angka / 10)] + ' puluh ' + bilangan[angka % 10];
                } else if (angka < 200) {
                    return 'seratus ' + terbilang_huruf(angka - 100);
                } else if (angka < 1000) {
                    return bilangan[Math.floor(angka / 100)] + ' ratus ' + terbilang_huruf(angka % 100);
                } else if (angka < 2000) {
                    return 'seribu ' + terbilang_huruf(angka - 1000);
                } else if (angka < 1000000) {
                    return terbilang_huruf(Math.floor(angka / 1000)) + ' ribu ' + terbilang_huruf(angka % 1000);
                } else if (angka < 1000000000) {
                    return terbilang_huruf(Math.floor(angka / 1000000)) + ' juta ' + terbilang_huruf(angka % 1000000);
                } else if (angka < 1000000000000) {
                    return terbilang_huruf(Math.floor(angka / 1000000000)) + ' miliar ' + terbilang_huruf(angka %
                        1000000000);
                } else if (angka < 1000000000000000) {
                    return terbilang_huruf(Math.floor(angka / 1000000000000)) + ' triliun ' + terbilang_huruf(angka %
                        1000000000000);
                } else {
                    return 'Angka terlalu besar';
                }
            } else {
                return 'Bukan angka';
            }
        }
    </script>
@endpush
