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
                    
                        <a href="<?php echo e(url('management-app/management-surat-kuasa/create-page')); ?>" class="btn btn-primary"> <i
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


<div class="modal modal-top fade" id="modals-top">
    <div class="modal-dialog">
        <form class="modal-content" id="form-modal">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title custom-title">
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="surat-kuasa_id" id="surat-kuasa_id">

                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Nama Surat</label>
                        <input type="text" class="form-control" name="nama_surat" id="nama_surat"
                            required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Nama Upload File</label>
                        <input type="file" class="form-control-file" name="file_upload" id="file_upload" required>
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

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            loadData()

            $('#saveBtn').click(function() {
                var formData = $('#form-modal').serialize();
                var url = route('management-app.surat-kuasa.create');

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
                    url: "<?php echo e(route('management-app.surat-kuasa.list')); ?>",
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
                                `<a href="<?php echo e(url('/management-app/management-surat-kuasa/show/${row.id}')); ?>" title="Detail" type="button" class="btn btn-sm btn-outline-secondary" ><i class="ion ion-md-eye"></i></a>`
                            html +=
                                `<a href="<?php echo e(url('/management-app/management-surat-kuasa/edit/${row.id}')); ?>" title="Edit" type="button" class="btn btn-sm btn-outline-secondary" ><i class="ion ion-ios-create"></i></a>`
                            html +=
                                `<a href="javascript:void(0)" onclick="btnDelete('${row.id}')" title="Hapus" type="button" class="btn btn-sm btn-outline-secondary btnDelete" ><i class="ion ion-ios-trash"></i></a>`
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
            $('.custom-title').html('Tambah Surat Kuasa')
            $('#surat-kuasa_id').val('')
            $('#kode_surat-kuasa').val('')
            $('#nama_surat-kuasa').val('')
            $('#deskripsi').val('')
            $('#status').html(`<select class="custom-select" name="isactive" >
                <option value="1" selected>Aktif</option>
                <option value="0">Nonaktif</option>
            </select>`)
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
            var url = "<?php echo e(route('management-app.surat-kuasa.delete', ':id')); ?>";
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
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/management-app/surat-kuasa/content/list.blade.php ENDPATH**/ ?>