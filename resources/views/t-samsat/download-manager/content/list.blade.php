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
            </div>

            <div id="accordion-1" class="collapse mt-2" data-parent="#accordion">
                <div class="row justify-content-center">
                    @if (checkUserPusat())
                    <div class="col-6">
                        <label class="col-form-label col-sm-4">Kantor Cabang</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="branch" id="branch">
                                <option selected value="ALL">- Pilih -</option>
                                @foreach ($branch as $item)
                                    <option value="{{ $item->branch }}">{{ $item->branch_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @else
                    <div class="col-6"></div>
                    @endif
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Tipe Laporan</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="tipe_laporan" id="tipe_laporan">
                                <option selected value="">- Pilih -</option>
                                <option value="pendaftaran">Laporan Registrasi</option>
                                <option value="pembatalan">Laporan Pembatalan</option>
                                <option value="blokir">Laporan Blokir Berkala</option>
                                <option value="transaksi-gagal">Laporan Pembayaran Gagal</option>
                                <option value="transaksi-sukses">Laporan Pembayaran Sukses</option>
                            </select>
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
                $("#branch").val('ALL')
                $('#tipe_laporan').val('')
                $('.datatables-demos').DataTable().clear().destroy()
                loadData()
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
                    url: "{{ route('download-manager.list.samsat') }}",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        branch: $("#branch").val(),
                        tipe_laporan: $("#tipe_laporan").val(),
                    }
                },
                columns: [{
                        title: "No",
                        width: "5%",
                        data: 'rownum',
                        mRender: function(data, type, row) {
                            return row.rownum;
                        }
                    },
                    {
                        title: "Kode Cabang",
                        width: "5%",
                        data: 'branch_code',
                    },
                    {
                        title: "Total File",
                        width: "5%",
                        data: 'counted_record',
                    },
                    {
                        title: "Tipe Laporan",
                        width: "5%",
                        data: 'document_type',
                    },
                    {
                        title: "File Name",
                        width: "10%",
                        data: 'filename',
                    },
                    {
                        title: "Extension",
                        width: "5%",
                        data: 'extension_file',
                    },
                    {
                        title: "Aksi",
                        data: 'id',
                        width: "5%",
                        class: "text-center",
                        mRender: function(data, type, row) {
                            var html
                            html =
                                `<a href="${row.route}" title="Download" type="button" class="btn btn-sm btn-outline-secondary" ><i class="ion ion-md-download"></i></a>`

                            return html
                        }
                    },
                ]
            });
        }
    </script>
@endpush
