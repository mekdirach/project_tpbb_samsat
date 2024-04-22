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
                <div class="col-md-6 text-right">
                    <button class="btn btn-primary" type="button" onclick="modalTambah()"><i
                            class="ion ion-md-add-circle-outline"></i> Tambah Data</button>

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
                <input type="hidden" name="pemda_id" id="pemda_id">
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Kode pemda</label>
                        <input type="text" class="form-control" name="kode_pemda" id="kode_pemda" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Nama pemda</label>
                        <input type="text" class="form-control" name="name_pemda" id="name_pemda" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Kota/Kabupaten</label>
                        <input type="text" class="form-control" name="name_kota" id="name_kota" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Biaya Admin</label>
                        <input type="number" class="form-control" name="biaya_admin" id="biaya_admin" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Min. Transaksi</label>
                        <input type="number" class="form-control" name="transaksi" id="transaksi" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Cut-off Day</label>
                        <input type="text" class="form-control" name="cut_off" id="cut_off" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Tgl. Jatuh Tempo</label>
                        <input type="date" class="form-control" name="date" id="date" required>
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
                var url = edit ? "{{ route('management-app.pemda.edit') }}" :
                    "{{ route('management-app.pemda.create') }}";

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
                    url: "{{ route('management-app.pemda.list') }}",
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
                        title: "Kode Pemda",
                        width: "5%",
                        data: 'mp_p_id',
                    },
                    {
                        title: "Nama Pemda",
                        width: "5%",
                        data: 'mp_p_nama',
                    },
                    {
                        title: "Kota/Kab",
                        width: "5%",
                        data: 'mp_mkk_nama',
                    },
                    {
                        title: "Created By",
                        width: "5%",
                        data: 'mp_p_created_by',
                    },
                    {
                        title: "Created At",
                        width: "5%",
                        data: 'mp_p_created_date',
                    },

                    {
                        title: "Action",
                        data: 'pbb_p_id',
                        width: "5%",
                        class: "text-center",
                        mRender: function(data, type, row) {

                            var html
                            html =
                                `<a href="javascript:void(0)" title="Edit" type="button" class="btn btn-sm btn-outline-secondary" onclick="modalEdit('${row.mp_p_id}')"><i class="ion ion-ios-create"></i></a>`
                            html +=
                                `<a href="{{ url('/management-app/pemda/show/${row.id}') }}" title="Detail" type="button" class="btn btn-sm btn-outline-secondary" ><i class="ion ion-md-eye"></i></a>`
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
            $('.custom-title').html('Tambah Data Pemda')
            $('#kode_pemda').val('')
            $('#name_pemda').val('')
            $('#name_kota').val('')
            $('#biaya_admin').val('')
            $('#transaksi').val('')
            $('#cut_off').val('')
            $('#date').val('')
            $('#status').html(`<select class="custom-select" name="isactive" >
                <option value="1" selected>Aktif</option>
                <option value="0">Nonaktif</option>
            </select>`)
        }

        function modalEdit(id) {
            $('#modals-top').modal('show')
            $('#status').attr('disabled', false);
            edit = true

            $.ajax({
                url: "{{ route('management-app.pemda.detail') }}",
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $('.custom-title').html('Edit Data Pemda')
                    $('#pemda_id').val(data.mp_p_id)
                    $('#kode_pemda').val(data.mp_p_id)
                    $('#name_pemda').val(data.mp_p_nama)
                    $('#name_kota').val(data.mp_mkk_nama)
                    $('#biaya_admin').val(data.mp_p_fee)
                    $('#transaksi').val(data.mp_p_min_fee)
                    $('#cut_off').val(data.mp_p_pembayaran_cutoff)
                    $('#date').val(data.mp_p_pembayaran_date)
                    $('#status').html(`<select class="custom-select" name="isactive" value="${data.isactive}">
                    <option value="1" ${data.isactive == true ? 'selected' : ''}>Aktif</option>
                    <option value="0" ${data.isactive == false ? 'selected' : ''}>Nonaktif</option>
                    </select>`)

                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
    </script>
@endpush
