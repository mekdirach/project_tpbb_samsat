<div class="card">
    <div class="card-header">
        <div class="row justify-content-end d-flex">
            <button class="btn btn-primary" type="button" onclick="modalTambah()"><i class="ion ion-md-add-circle-outline"></i> Tambah
                Role</button>
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
                <input type="hidden" name="role_id" id="role_id">
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" required>
						<label id="texname" style="color:red; display: block; margin-top: 5px;"></label>

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
                <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
            </div>
        </form>
    </div>
</div>
</div>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
$(document).ready(function () {
    loadData()

    $('#saveBtn').click(function () {
				var name = $('#name').val();
                if (name == "") {
                    $('#texname').html('*Nama Harus Diisi')
                } else {
                    $('#texname').html('')
                    var formData = $('#form-modal').serialize();
                    var url = edit ? "<?php echo e(route('management-app.role-management.edit')); ?>" :
                        "<?php echo e(route('management-app.role-management.create')); ?>";
						console.log(formData);

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
                }
    });
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
            url: "<?php echo e(route('management-app.role-management.list')); ?>",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
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
                title: "Nama",
                width: "5%",
                data: 'name',
            },
            {
                title: "Status",
                data: 'isactive',
                width: "15%",
                mRender: function(data, type, row) {
                    let html = "";
                    if (row.isactive === true)
                    html = `<span class="badge badge-success status-span">Aktif<i class="fa fa-check"></i></span>`;
                    else
                    html = `<span class="badge badge-danger status-span">Nonaktif<i class="fa fa-clock"></i></span>`;

                    return html
                }
            },
            {
                title: "Aksi",
                data: 'id',
                width: "5%",
                class: "text-center",
                mRender: function(data, type, row) {
                    var html
                    html = `<a href="javascript:void(0)" title="Edit" type="button" class="btn btn-sm btn-outline-secondary" onclick="modalEdit('${row.id}')"><i class="ion ion-ios-create"></i></a>`
                    html  += `<a href="<?php echo e(url('/management-app/role-management/show/permission/${row.id}')); ?>" title="Detail" type="button" class="btn btn-sm btn-outline-secondary" ><i class="ion ion-md-eye"></i></a>`

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
    $('.custom-title').html('Tambah Role')
    $('#name').val('')
    $('#status').html(`<select class="custom-select" name="isactive" disabled>
        <option value="1" selected>Aktif</option>
        <option value="0">Nonaktif</option>
    </select>`)
}

function modalEdit(id) {
    $('#modals-top').modal('show')
    $('#status').attr('disabled', false);
    edit = true

    $.ajax({
      url: "<?php echo e(route('management-app.role-management.show')); ?>",
      method: 'POST',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id
      },
      success: function (data) {
        $('.custom-title').html('Edit Role')
        $('#role_id').val(data.id)
        $('#name').val(data.name);
        $('#status').html(`<select class="custom-select" name="isactive" value="${data.isactive}">
          <option value="1" ${data.isactive == true ? 'selected' : ''}>Aktif</option>
          <option value="0" ${data.isactive == false ? 'selected' : ''}>Nonaktif</option>
          </select>`)
      },
      error: function (error) {
        console.error('Error fetching data:', error);
      }
    });
}

</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/management-app/role-management/content/list.blade.php ENDPATH**/ ?>