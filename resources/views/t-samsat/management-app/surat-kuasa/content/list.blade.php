<div class="card">
    <div class="card-header">
        <div id="accordion">
            <div class="row">
                <div class="col-md-6">
                    <form class="row g-3" id="form-cari">
                        <div class="col-auto  mx-auto my-auto">
                            <label for="inputName" class="form-label">Nama Produk</label>
                        </div>
                        <div class="col-auto mx-auto my-auto">
                            <input type="text" class="form-control" id="inputName" name="inputName"
                                placeholder="Masukkan Nama Produk...." style="width: 300px; display: inline-block;">
                            <button type="submit" class="btn btn-primary" onclick="loadData()"
                                style="display: inline-block; vertical-align: top;">Cari</button>
                        </div>

                        <div class="col-auto">

                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-right">
                    {{-- <button class="btn btn-primary" type="button" onclick="modalTambah()"><i
                            class="ion ion-md-add-circle-outline"></i> Tambah Data</button> --}}
                        <a href="{{ url('management-app/management-surat-kuasa/create-page')}}" class="btn btn-primary"> <i
                            class="ion ion-md-add-circle-outline"></i>Tambah</a>

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

            $('#form-cari').submit(function(e) {
                e.preventDefault();
                loadData();
            });
        });


        function loadData() {
            var keyword = $('#inputName').val();
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
                    url: "{{ route('management-app.surat-kuasa-samsat.list') }}",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        keyword: keyword
                    }
                },
                columns: [{
                        title: "No",
                        width: "1%",
                        data: 'rownum',
                        mRender: function(data, type, row) {
                            return row.rownum;
                        }
                    },
                    {
                        title: "Nama Surat",
                        width: "5%",
                        data: 'nama_template',
                    },
                    {
                        title: "File Name",
                        width: "5%",
                        data: 'file_template',
                    },
                    {
                        title: "Created By",
                        width: "5%",
                        data: 'created_by',
                    },
                    {
                        title: "Status",
                        data: 'status',
                        width: "5%",
                        class: "text-center",
                        mRender: function(data, type, row) {
                            let html = "";
                            if (row.status == 1) {
                                html =
                                    `<span class="badge badge-success status-span">Aktif<i class="fa fa-check"></i></span>`;
                            } else {
                                html =
                                    `<span class="badge badge-danger status-span">Tidak Aktif<i class="fa fa-clock"></i></span>`;
                            }
                            return html;

                        }
                    },
                    {
                        title: "Action",
                        data: 'kode_suratkuasa',
                        width: "5%",
                        class: "text-center",
                        mRender: function(data, type, row) {
                            var html
                            html =
                                `<a href="{{ url('/management-app/management-surat-kuasa/show/${row.id}') }}" title="Detail" type="button" class="btn btn-sm btn-outline-secondary" ><i class="ion ion-md-eye"></i></a>`
                            html +=
                                `<a href="{{ url('/management-app/management-surat-kuasa/edit/${row.id}') }}" title="Edit" type="button" class="btn btn-sm btn-outline-secondary" ><i class="ion ion-ios-create"></i></a>`
                            html +=
                                `<a href="javascript:void(0)" onclick="btnDelete('${row.id}')" title="Hapus" type="button" class="btn btn-sm btn-outline-secondary btnDelete" ><i class="ion ion-ios-trash"></i></a>`
                            return html
                        }
                    },
                ]
            });
        }

        function btnDelete(id) {
            $('.btnDelete').click(function(){
                swal({
                    title: "Konfirmasi",
                    text: "Apakah anda yakin ingin hapus file ini?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    closeOnConfirm: false,
                },
                function(isConfirm) {
                    if (isConfirm) {
                        ajaxDelete(id)
                    }
                });
            });
        }

        function ajaxDelete(id) {
            var url = "{{ route('management-app.surat-kuasa-samsat.delete', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type: "DELETE",
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    console.log(response);
                    if (response.rc == '0000') {
                        loadData()
                        swal("Sukses", response.message, "success");
                    } else {
                        swal("Sukses", response.message, "success");
                    }
                }
            });
        }
    </script>
@endpush
