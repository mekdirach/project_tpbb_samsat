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
                <div class="col-md-6 text-right">
                    <button class="btn btn-success" id="btnExport" type="button"><i class="fas fa-share-square"></i> Export</button>
                </div>
            </div>

            <div id="accordion-1" class="collapse mt-2" data-parent="#accordion">
                <div class="row justify-content-center">
                    <?php if(checkUserPusat()): ?>
                    <div class="col-6">
                        <label class="col-form-label col-sm-4">Kantor Cabang</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="branch" id="branch">
                                <option selected value="ALL">- Pilih -</option>
                                <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->branch); ?>"><?php echo e($item->branch_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="col-6"></div>
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
                        <label class="col-form-label col-sm-6">Provinsi</label>
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
                        <label class="col-form-label col-sm-6">Nama Nasabah</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Tanggal Pembatalan</label>
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
        <table class="datatables-demos table table-striped table-bordered">
        </table>
    </div>
</div>

<div class="modal fade" id="modals-default">
    <div class="modal-dialog">
        <form action="<?php echo e(route('laporan.pembatalan-export')); ?>" method="POST" class="modal-content">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title custom-title">Export
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="mBranch" id="mBranch">
                <input type="hidden" name="mNop" id="mNop">
                <input type="hidden" name="mPemda" id="mPemda">
                <input type="hidden" name="mNama" id="mNama">
                <input type="hidden" name="mNorek" id="mNorek">
                <input type="hidden" name="mStart" id="mStart">
                <input type="hidden" name="mEnd" id="mEnd">
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Tipe</label>
                        <select name="type" class="custom-select" id="type">
                            <option value="1">Excel</option>
                            <option value="2">PDF</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveBtn">Export</button>
            </div>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
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
                $("#branch").val('ALL')
                $('#nomor_polisi').val('')
                $('#pemda').val('')
                $('#nama').val('')
                $('#norek').val('')
                $('#start').val('')
                $('#end').val('')
                $('.datatables-demos').DataTable().clear().destroy()
                loadData()
            })

            $('#btnExport').on('click', function() {
                $('#modals-default').modal('show')
                $('#mBranch').val($('#branch').val())
                $('#mNop').val($('#nomor_polisi').val())
                $('#mPemda').val($('#pemda').val())
                $('#mNama').val($('#nama').val())
                $('#mNorek').val($('#norek').val())
                $('#mStart').val($('#start').val())
                $('#mEnd').val($('#end').val())
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
                    url: "<?php echo e(route('laporan-samsat.pembatalan-list')); ?>",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        branch: $('#branch').val(),
                        nomor_polisi: $('#nomor_polisi').val(),
                        pemda: $('#pemda').val(),
                        nama: $('#nama').val(),
                        norek: $('#norek').val(),
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
                        title: "Pemda",
                        width: "5%",
                        data: 'mp_mp_nama',
                    },
                    {
                        title: "No. Rekening",
                        width: "5%",
                        data: 'rekening_external',
                    },
                    {
                        title: "Nama Nasabah",
                        width: "9%",
                        data: 'nm_pemilik',
                    },
                    {
                        title: "Nomor Polisi",
                        width: "5%",
                        data: 'nomor_polisi',
                    },
                    {
                        title: "Status",
                        width: "5%",
                        data: 'registrasi_jenis',
                    },
                    {
                        title: "Tanggal Pembatalan",
                        data: 'created_at',
                        width: "10%",
                        // mRender: function(data, type, row) {
                        //     var result = getFormatDate('d-m-y' , data)
                        //     return result
                        // }
                    },
                    {
                        title: "Jumlah Tagihan",
                        data: 'pajak_total_tagihan',
                        width: "10%",
                        mRender: function(data, type, row) {
                            var result = `Rp ${number_format(data)}`
                            return result
                        }
                    },
                ]
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/t-samsat/laporan/pembatalan/content/list.blade.php ENDPATH**/ ?>