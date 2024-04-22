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
        <form action="{{ route('laporan.transaksi-gagal-exort') }}" method="POST" class="modal-content">
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
                    url: "{{ route('laporan.transaksi-gagal-list') }}",
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
                        title: "Deskripsi Error",
                        data: 'mp_pbb_tp_message',
                        width: "5%",
                    },
                ]
            });
        }
    </script>
@endpush
