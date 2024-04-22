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
                    <button class="btn btn-success" id="btnExport" type="button"><i class="fas fa-share-square"></i> Export</button>
                </div>
            </div>

            <div id="accordion-1" class="collapse mt-2" data-parent="#accordion">
                <div class="row">
                    @if (checkUserPusat())
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
                    @endif
                    <div class="col-6">
                        <label class="col-form-label col-sm-4">NOP</label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nop" id="nop">
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="row justify-content-end">
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Nomor Rekening</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="norek" id="norek">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-sm btn-primary" id="btnSearch"><i class="ion ion-ios-search"></i> Cari</button>
                    </div>
                    <div class="col-sm-6 text-left">
                        <button class="btn btn-sm btn-warning" id="btnReset">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-datatable table-responsive">
        <table class="datatables-demos table bootstrap-table table-borderless">
        </table>
    </div>
</div>

<div class="modal fade" id="modals-default">
    <div class="modal-dialog">
        <form action="{{ route('pbb.daftar-tpbb.export') }}" method="POST" class="modal-content">
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
            $('.datatables-demos thead').addClass('thead-light');

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
            })
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
                lengthChange: false,
                info: true,
                autoWidth: false,
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
                    url: "{{ route('pbb.daftar-tpbb.list') }}",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        branch: $('#branch').val(),
                        nop: $('#nop').val(),
                        pemda: $('#pemda').val(),
                        nama: $('#nama').val(),
                        norek: $('#norek').val(),
                    }
                },
                columns: [
                    {
                        title: "No",
                        width: "5%",
                        data: 'rownum',
                        mRender: function(data, type, row) {
                            return row.rownum;
                        }
                    },
                    {
                        title: "Aksi",
                        data: 'id',
                        width: "5%",
                        mRender: function(data, type, row) {
                            var html
                            html =
                                `<a href="{{url('/pbb/daftar-tpbb/show/${row.id}')}}" title="Detail" type="button" class="btn btn-sm btn-outline-secondary" ><i class="ion ion-md-eye"></i></a>`
                            return html
                        }
                    },
                    {
                        title: "Nama Pemda",
                        width: "5%",
                        data: 'mp_mkk_nama',
                    },
                    {
                        title: "NOP",
                        width: "5%",
                        data: 'pbb_c_nop',
                    },
                    {
                        title: "Nama Wajib Pajak",
                        width: "5%",
                        data: 'pbb_c_nop_name',
                    },
                    {
                        title: "Nomor Rekening",
                        width: "5%",
                        data: 'pbb_c_src_extacc',
                    },
                    {
                        title: "Jenis Registrasi",
                        width: "5%",
                        data: 'pbb_c_reg_type',
                    },
                    {
                        title: "Jumlah Tagihan",
                        width: "5%",
                        data: 'pbb_c_amount',
                        mRender: function(data, type, row) {
                            var result = `Rp ${(data)}`
                            return result
                        }
                    },
                ]
            });
        }
    </script>
@endpush
