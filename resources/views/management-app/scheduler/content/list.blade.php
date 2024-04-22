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
                <input type="hidden" name="scheduler_id" id="scheduler_id">
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Kode Scheduler</label>
                        <input type="number" class="form-control" name="kode_scheduler" id="kode_scheduler" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_scheduler" id="nama_scheduler" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Start Time</label>
                        <input type="time" class="form-control" name="_time" id="_time" required>
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
                <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
            </div>
        </form>
    </div>
</div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            loadData()

            $('#saveBtn').click(function() {
                var formData = $('#form-modal').serialize();
                var url = edit ? "{{ route('management-app.scheduler.edit') }}" :
                    "{{ route('management-app.scheduler.create') }}";

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
					success: function(response) {
                            if (response.responseCode == '0000') {
                                $('#modals-top').modal('hide');
                                swal("Sukses", response.responseDesc, "success");
                            } else {
                                $('#modals-top').modal('hide');
                                swal("Gagal", response.responseDesc, "warning");
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
            var keyword = $('#inputName').val();
            console.log(keyword);
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
                    url: "{{ route('management-app.scheduler.list') }}",
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
                        title: "Kode Scheduler",
                        width: "5%",
                        data: 'id',
                    },
                    {
                        title: "Nama Produk",
                        width: "5%",
                        data: 'name',
                    },
                    {
                        title: "Start Time",
                        width: "5%",
                        data: 'start_time',
                    },
                    {
                        title: "Deskripsi",
                        width: "5%",
                        data: 'description',
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
                        data: 'id',
                        width: "5%",
                        class: "text-center",
                        mRender: function(data, type, row) {

                            var html
                            html =
                                `<a href="javascript:void(0)" title="Edit" type="button" class="btn btn-sm btn-outline-secondary" onclick="modalEdit('${row.id}')"><i class="ion ion-ios-create"></i></a>`
                            return html
                        }
                    },
                ]
            });
        }

        var edit = false



        function modalEdit(id) {
            $('#modals-top').modal('show')
            $('#status').attr('disabled', false);
            edit = true
            console.log(id);

            $.ajax({
                url: "{{ route('management-app.scheduler.detail') }}",
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $('.custom-title').html('Edit Data scheduler')
                    $('#scheduler_id').val(data.id)
                    $('#kode_scheduler').val(data.id)
                    $('#_time').val(data.start_time)
                    $('#nama_scheduler').val(data.name)
                    $('#deskripsi').val(data.description)
                    $('#status').html(`<select class="custom-select" name="isactive" value="${data.status}">
                    <option value="1" ${data.status == 1 ? 'selected' : ''}>Aktif</option>
                    <option value="0" ${data.status == 0 ? 'selected' : ''}>Nonaktif</option>
                    </select>`)

                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
    </script>
@endpush
