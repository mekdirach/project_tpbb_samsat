<div class="card">
    <div class="card-header">
        <div id="accordion">
            <div class="row">
                <div class="col-md-6">
                    <form class="row g-3" id="form-cari">
                        <div class="col-auto  mx-auto my-auto">
                            <label for="inputProduk" class="form-label">Nama Produk</label>
                        </div>
                        <div class="col-auto mx-auto my-auto">
                            <input type="text" class="form-control" id="inputProduk" name="inputProduk"
                                placeholder="Masukkan Nama Produk...." style="width: 300px; display: inline-block;">
                            <button type="submit" class="btn btn-primary" onclick="loadData()"
                                style="display: inline-block; vertical-align: top;">Cari</button>
                        </div>

                        <div class="col-auto">

                        </div>
                    </form>
                </div>
                {{-- <div class="col-md-6 text-right">
                    <button class="btn btn-primary" type="button" onclick="modalTambah()"><i
                            class="ion ion-md-add-circle-outline"></i> Tambah Data</button>

                </div> --}}
            </div>
        </div>
    </div>

    <div class="card-datatable table-responsive">
        <table class="datatables-demos table table-striped table-bordered">
        </table>
    </div>
</div>


<div class="modal modal-top fade" id="modals-top">
    <div class="modal-dialog">
        <form class="modal-content" id="form-modal">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title custom-title">
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="param_id" id="param_id">
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
            </div>
        </form>
    </div>
</div>

<div class="modal modal-top fade" id="modals-view">
    <div class="modal-dialog">
        <form class="modal-content" id="form-modal">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title custom-title">
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Nama Provinsi</label>
                        <input type="text" class="form-control" name="mp_nama" id="mp_nama" required readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Nama Kota/Kabupaten</label>
                        <input type="text" class="form-control" name="mkk_nama" id="mkk_nama" required readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Status</label>
                        <div id="status"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>



@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            loadData()

            $('#saveBtn').click(function() {
                var formData = $('#form-modal').serialize();
                var url = edit ? "{{ route('management-app.provinsi.edit') }}" :
                    "{{ route('management-app.provinsi.create') }}";

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.rc == '0000') {
                            $('#modals-top').modal('hide');
                            swal("Sukses", response.message, "success");
                        } else {
                            $('#modals-top').modal('hide');
                            swal("Gagal", response.message, "warning");
                        }
                        loadData()
                    },
                    error: function(error) {
                        console.error('Error saving data:', error);
                    }
                });
            });

            $('#form-cari').submit(function(e) {
                e.preventDefault();
                loadData();
            });
        });


        function loadData() {
            var keyword = $('#inputProduk').val();
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
                    url: "{{ route('management-app.provinsi.list') }}",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        keyword: keyword
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
                        title: "Kode Provinsi",
                        width: "5%",
                        data: 'mp_mp_kode',
                        class: "text-center",
                    },
                    {
                        title: "Nama Provinsi",
                        width: "5%",
                        data: 'mp_mp_nama',
                        class: "text-center",
                    },
                    {
                        title: "Created Date",
                        width: "5%",
                        data: 'mp_mp_created_at',
                        class: "text-center",
                    },
                    {
                        title: "Created By",
                        width: "5%",
                        data: 'mp_mp_created_by',
                        class: "text-center",
                    },
                    {
                        title: "Kota/Kab Terdaftar",
                        width: "5%",
                        data: 'mp_mkk_kode',
                        class: "text-center",
                    },
                    {
                        title: "Status",
                        data: 'mp_mp_status',
                        width: "5%",
                        class: "text-center",
                        mRender: function(data, type, row) {
                            let html = "";
                            if (row.mp_mp_status == 1) {
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
                        data: 'mp_mp_kode',
                        width: "5%",
                        class: "text-center",
                        mRender: function(data, type, row) {

                            var html
                            html =
                                `<a href="javascript:void(0)" title="Detail" type="button" class="btn btn-sm btn-outline-secondary" onclick="modalView('${row.mp_mkk_kode}')"><i class="ion ion-md-eye"></i></a>`
                            return html
                        }
                    },
                ]
            });
        }

        var edit = false

        function modalTambah() {
            edit = false

            $('#modals-top').modal('show')
            $('.custom-title').html('Tambah Master Provinsi')
            $('#name').val('')
            $('#status').html(`<select class="custom-select" name="isactive" disabled>
                <option value="1" selected>Aktif</option>
                <option value="0">Nonaktif</option>
            </select>`)
        }

        function modalView(id) {
            $('#modals-view').modal('show')
            $('#status').attr('disabled', false);
            edit = true
            $.ajax({
                url: "{{ route('management-app.provinsi.show') }}",
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: id
                },

                success: function(data) {

                    $('.custom-title').html('View Master Provinsi')
                    $('#param_id').val(data.mp_mp_kode)
                    $('#mp_nama').val(data.mp_mp_nama)
                    $('#mkk_nama').val(data.mp_mkk_nama)
                    $('#status').html(`
                        <select class="custom-select" name="isactive" disabled>
                            <option value="1" ${data.mp_mp_status == 1 ? 'selected' : ''} required>Aktif</option>
                            <option value="0" ${data.mp_mp_status == 0 ? 'selected' : ''} required>Nonaktif</option>
                        </select>
                    `);
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
    </script>
@endpush
