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

                    <div class="col-6">
                        <label class="col-form-label col-sm-4">User UIM</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="user_uim" id="user_uim">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Branch</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="branch" id="branch">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Tanggal Akses</label>
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
                        <label class="col-form-label col-sm-6">Kategori</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="kategori" id="kategori">
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
                $('#user_uim').val('')
                $('#kategori').val('')
                $('#start').val('')
                $('#end').val('')
                $('.datatables-demos').DataTable().clear().destroy()
                loadData()
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
                    url: "{{ route('log.activity-list') }}",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        branch: $('#branch').val(),
                        nop: $('#user_uim').val(),
                        kategori: $('#kategori').val(),
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
                        title: "User",
                        width: "5%",
                        data: 'cua_by_uid',
                    },
                    {
                        title: "Branch",
                        width: "5%",
                        data: 'branch_code',
                    },
                    {
                        title: "kategori",
                        width: "8%",
                        data: 'cua_cate',
                    },
                    {
                        title: "Tanggal",
                        width: "5%",
                        data: 'cua_dt',
                    },
                    {
                        title: "Workstation",
                        width: "5%",
                        data: 'cua_ip',
                    },
                    {
                        title: "Deskripsi",
                        width: "8%",
                        data: 'cua_desc',
                    },
                ]
            });
        }
    </script>
@endpush
