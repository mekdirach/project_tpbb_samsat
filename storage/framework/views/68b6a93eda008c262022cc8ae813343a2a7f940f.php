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
                        <label class="col-form-label col-sm-6">Nomor Rekening</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="norek" id="norek">
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
                <div class="row justify-content-center">
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Pemda</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="pemda" id="pemda">
                                <option selected value="">- Pilih -</option>
                                <?php $__currentLoopData = $pemda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->mp_p_id); ?>"><?php echo e($item->mp_mkk_nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <label class="col-form-label col-sm-6">Jenis Approval</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="approval" id="approval">
                                <option selected value="1">Registrasi</option>
                                <option value="2">Pembatalan</option>
                            </select>
                        </div>
                    </div>
                    <?php if(checkUserPusat()): ?>
                    <div class="col-6">
                        <label class="col-form-label col-sm-4">Kantor Cabang</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="branch" id="branch">
                                <option selected value="">- Pilih -</option>
                                <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->branch); ?>"><?php echo e($item->branch_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <?php endif; ?>
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
        <table class="datatables-demos table bootstrap-table table-borderless">
        </table>
        <div class="row justify-content-start m-3">
            <button class="btn btn-secondary" id="btnApprove" onclick="modalCheckUser('', '', 'approve_bulk')">Approve</button>
            <button class="btn btn-danger" id="btnReject" onclick="modalCheckUser('', '', 'reject_bulk')">Reject</button>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body" id="confirmModBody">
                <div class="row">
                    <div class="col-md-12">
                        <label>Username UIM Supervisor</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Username">
                        <input type="hidden" id="noRef">
                        <input type="hidden" id="type">
                        <input type="hidden" id="label">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Password">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" id="btnCheckUser">Konfirmasi</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
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
                $('#approval').val('1')
                $('.datatables-demos').DataTable().clear().destroy()
                loadData()
            })

            $('#btnCheckUser').click(function (e) {
                e.preventDefault();

                let noref = $('#noRef').val()
                let type = $('#type').val()
                let label = $('#label').val()

                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('approval.check-user')); ?>",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        username: $('#username').val(),
                        password: $('#password').val(),
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.rc === '0000') {
                            $('#modal-user').modal('hide');
                            if (label == 'approve_bulk' || label == 'approve') {
                                setApprove(noref, type, label)
                            } else if (label == 'reject_bulk' || label == 'reject') {
                                setReject(noref, type, label)
                            }
                        } else {
                            $('#modal-user').modal('hide');
                            swal("Gagal", response.message, "error");
                        }
                    }
                });
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
                    url: "<?php echo e(route('approval.list')); ?>",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        branch: $('#branch').val(),
                        nop: $('#nop').val(),
                        pemda: $('#pemda').val(),
                        nama: $('#nama').val(),
                        norek: $('#norek').val(),
                        approval: $('#approval').val(),
                    }
                },
                columns: [{
                        title: "<input type='checkbox' id='checkAll' onclick='checkCbApproval()' title='Semua'>",
                        data: 'pbb_c_id',
                        width: "3%",
                        mRender: function(data, type, row) {
                            return `<input type='checkbox' name="noRefs[]" noRefs="${data}" value="${row.pbb_c_approval}" class="cb_id">`;
                        }
                    },
                    {
                        title: "Aksi",
                        data: 'pbb_c_id',
                        width: "7%",
                        mRender: function(data, type, row) {
                            var html
                            html =
                                `<a href="javascript:void(0)" onclick="modalCheckUser('${row.pbb_c_id}', '${row.pbb_c_approval}', 'approve')" title="Approve" type="button" class="btn btn-sm btn-outline-secondary" ><i class="ion ion-md-checkmark"></i></a>`
                            html +=
                                `<a href="javascript:void(0)" onclick="modalCheckUser('${row.pbb_c_id}', '${row.pbb_c_approval}', 'reject')" title="Reject" type="button" class="btn btn-sm btn-outline-danger ml-1" ><i class="ion ion-md-close"></i></a>`
                            return html
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
                    {
                        title: "Approval",
                        width: "5%",
                        data: 'pbb_c_approval',
                        mRender: function(data, type, row) {
                            var text
                            if (data == 1) {
                                text = 'Registrasi'
                            } else if (data == 2) {
                                text = 'Pembatalan'
                            }
                            return text
                        }
                    },
                ]
            });
        }

        function checkCbApproval() {
            if ($('#checkAll').prop('checked')) {
                $('.cb_id').prop('checked', true)
            } else {
                $('.cb_id').prop('checked', false)
            }
        }

        function modalCheckUser(noRef, type, label) {
            $('#modal-user').modal('show');
            $('#username').val('')
            $('#password').val('')

            $('#noRef').val(noRef)
            $('#type').val(type)
            $('#label').val(label)
        }

        function setApprove(noRef, type, label) {
            var tCheckedData = []
            var types = ''
            if (label == 'approve_bulk') {
                $('.cb_id').each(function(k, v) {
                    if ($(this).prop('checked')) {
                        tCheckedData.push($(this).attr('noRefs'))
                        types = $(this).val()
                    }
                })
            } else {
                tCheckedData.push(noRef)
                types = type
            }

            if (tCheckedData.length > 0) {
                $.ajax({
                    url: "<?php echo e(route('approval.update-approve')); ?>",
                    type: 'post',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        noRef: tCheckedData,
                        type: types
                    },
                    success: function(response) {
                        if (response.responseCode == '0000') {
                            loadData()
                            swal("Sukses", response.responseDesc, "success");
                        } else {
                            swal("Gagal", response.responseDesc, "error");
                        }
                    },
                    error: function(xhr, status, thrown) {
                        swal("", "Data Gagal Di Approve", "warning");
                    },
                })
                //end ajax
            } else {
                swal({
                    title: "Warning",
                    text: "Pilih salah satu data",
                    type: "warning",
                    timer: 1500
                });
            }

        }

        function setReject(noRef, type, label) {
            var tCheckedData = []
            if (label == 'reject_bulk') {
                $('.cb_id').each(function(k, v) {
                    if ($(this).prop('checked')) {
                        tCheckedData.push($(this).attr('noRefs'))
                        types = $(this).val()
                    }
                })
            } else {
                tCheckedData.push(noRef)
                types = type
            }

            if (tCheckedData.length > 0) {
                $.ajax({
                    url: "<?php echo e(route('approval.update-reject')); ?>",
                    type: 'post',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        noRef: tCheckedData,
                        type: type
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.rc == '0000') {
                            loadData()
                            swal({
                                title: "Sukses",
                                text: response.message,
                                type: "success",
                                timer: 1500
                            });
                        } else {
                            swal({
                                title: "Gagal",
                                text: response.message,
                                type: "error",
                                timer: 1500
                            });
                        }
                    },
                    error: function(xhr, status, thrown) {
                        swal({
                            title: "Warning",
                            text: "Gagal Reject Data",
                            type: "warning",
                            timer: 1500
                        });
                    },
                })
            } else {
                swal({
                    title: "Warning",
                    text: "Pilih salah satu data",
                    type: "warning",
                    timer: 1500
                });
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/approval/content/list.blade.php ENDPATH**/ ?>