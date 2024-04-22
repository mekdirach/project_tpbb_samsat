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
                <div class="row">
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
                    <div class="col-6">
                        <label class="col-form-label col-sm-4">Nomor Polisi</label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nomor_polisi" id="nomor_polisi">
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
                                    <option value="<?php echo e($item->mp_mp_kode); ?>"><?php echo e($item->mp_mp_nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Nama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Jenis Approval</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="approval" id="approval">
                                <option selected value="1">Registrasi</option>
                                <option value="2">Pembatalan</option>
                                <option value="3">Pembatalan ARO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Nomor Rekening</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="norek" id="norek">
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
                        <input type="hidden" id="nopol">
                        <input type="hidden" id="tahun">
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
                $('#nomor_polisi').val('')
                $('#pemda').val('')
                $('#nama').val('')
                $('#norek').val('')
                $('#approval').val('1')
                $('.datatables-demos').DataTable().clear().destroy()
                loadData()
            })

            $('#btnCheckUser').click(function (e) {
                e.preventDefault();

                let nopol = $('#nopol').val()
                let tahun = $('#tahun').val()
                let label = $('#label').val()

                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('approval-samsat.check-user')); ?>",
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
                                setApprove(nopol, tahun, label)
                            } else if (label == 'reject_bulk' || label == 'reject') {
                                setReject(nopol, tahun, label)
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
                    url: "<?php echo e(route('approval-samsat.list')); ?>",
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
                        data: 'nomor_polisi',
                        width: "3%",
                        mRender: function(data, type, row) {
                            return `<input type='checkbox' name="mData[]" mData="${data}" value="${row.tahun_pajak}" class="cb_id">`;
                        }
                    },
                    {
                        title: "Aksi",
                        data: 'nomor_polisi',
                        width: "7%",
                        mRender: function(data, type, row) {
                            var html
                            html =
                                `<a href="javascript:void(0)" onclick="modalCheckUser('${row.nomor_polisi}', '${row.tahun_pajak}', 'approve')" title="Approve" type="button" class="btn btn-sm btn-outline-secondary" ><i class="ion ion-md-checkmark"></i></a>`
                            html +=
                                `<a href="javascript:void(0)" onclick="modalCheckUser('${row.nomor_polisi}', '${row.tahun_pajak}', 'reject')" title="Reject" type="button" class="btn btn-sm btn-outline-danger ml-1" ><i class="ion ion-md-close"></i></a>`
                            return html
                        }
                    },
                    {
                        title: "Nama Pemda",
                        width: "5%",
                        data: 'mp_mp_nama',
                    },
                    {
                        title: "Nomor Polisi",
                        width: "5%",
                        data: 'nomor_polisi',
                    },
                    {
                        title: "Nama Pemilik",
                        width: "5%",
                        data: 'nm_pemilik',
                    },
                    {
                        title: "Nomor Rekening",
                        width: "5%",
                        data: 'rekening_external',
                    },
                    {
                        title: "Jenis Registrasi",
                        width: "5%",
                        data: 'registrasi_jenis',
                    },
                    {
                        title: "Jumlah Tagihan",
                        width: "5%",
                        data: 'pajak_total_tagihan',
                        mRender: function(data, type, row) {
                            var result = `Rp ${number_format(data)}`
                            return result
                        }
                    },
                    {
                        title: "Approval",
                        width: "5%",
                        data: 'status_approval',
                        mRender: function(data, type, row) {
                            var text
                            if (data == 1) {
                                text = 'Registrasi'
                            } else if (data == 2) {
                                text = 'Pembatalan'
                            } else if (data == 3) {
                                text = 'Pembatalan ARO'
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

        function modalCheckUser(nopol, tahun, label) {
            $('#modal-user').modal('show');
            $('#username').val('')
            $('#password').val('')

            $('#nopol').val(nopol)
            $('#tahun').val(tahun)
            $('#label').val(label)
        }

        function setApprove(nopol, tahun, label) {
            var tCheckedData = []
            var approval_type = $('#approval').val()
            var route = ''

            if (label == 'approve_bulk') {
                $('.cb_id').each(function(k, v) {
                    if ($(this).prop('checked')) {
                        if (approval_type == 3) {
                            tCheckedData.push({
                                nomorPolisi: $(this).attr('mData'),
                                tahunPajak: $(this).val(),
                                statusARO: '0'
                            })
                        } else {
                            tCheckedData.push({
                                nomorPolisi: $(this).attr('mData'),
                                tahunPajak: $(this).val()
                            })
                        }
                    }
                })
            } else {
                if (approval_type == 3) {
                    tCheckedData.push({
                        nomorPolisi: nopol,
                        tahunPajak: tahun,
                        statusARO: '0'
                    })
                } else {
                    tCheckedData.push({
                        nomorPolisi: nopol,
                        tahunPajak: tahun
                    })
                }
            }

            if (approval_type == 1) {
                route = "<?php echo e(route('approval-samsat.update-approve-registrasi')); ?>"
            }else if (approval_type == 2){
                route = "<?php echo e(route('approval-samsat.update-approve-pembatalan')); ?>"
            }else if (approval_type == 3){
                route = "<?php echo e(route('approval-samsat.update-approve-pembatalan-aro')); ?>"
            }

            if (tCheckedData.length > 0) {
                $.ajax({
                    url: route,
                    type: 'post',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        mData: tCheckedData
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

        function setReject(nopol, tahun, label) {
            var tCheckedData = []
            var tahunPajak = ''
            if (label == 'reject_bulk') {
                $('.cb_id').each(function(k, v) {
                    if ($(this).prop('checked')) {
                        tCheckedData.push($(this).attr('mData'))
                    }
                })
            } else {
                tCheckedData.push(nopol)
            }

            if (tCheckedData.length > 0) {
                $.ajax({
                    url: "<?php echo e(route('approval-samsat.update-reject')); ?>",
                    type: 'post',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        nopol: tCheckedData
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
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/t-samsat/approval/content/list.blade.php ENDPATH**/ ?>