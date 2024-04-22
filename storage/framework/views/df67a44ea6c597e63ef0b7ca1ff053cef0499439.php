<div class="card">
    <div class="card-body">
        <form action="<?php echo e(route('pbb.surat-kuasa.generate-docx')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="pbb_c_lokasi" id="pbb_c_lokasi">
            <input type="hidden" name="pbb_c_kab_kota" id="pbb_c_kab_kota">
            <input type="hidden" name="pbb_c_nik" id="pbb_c_nik">
            <input type="hidden" name="pbb_c_autoblokir_awal_tgl" id="pbb_c_autoblokir_awal_tgl">
            <input type="hidden" name="pbb_c_autoblokir_akhir_tgl" id="pbb_c_autoblokir_akhir_tgl">
            <input type="hidden" name="pbb_c_total_amount" id="pbb_c_total_amount">
            <input type="hidden" name="pbb_c_phone" id="pbb_c_phone">
            <input type="hidden" name="pbb_c_mail" id="pbb_c_mail">
            <div class="row">
                <div class="col-6">
                    <div class="row m-3">
                        <label class="col-form-label col-sm-4">Pemda</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="pemda" id="pemda">
                                <option selected value="">- Pilih -</option>
                                <?php $__currentLoopData = $pemda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->mp_p_id); ?>"> <?php echo e($item->mp_p_nama); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row m-3">
                        <label class="col-form-label col-sm-4">Nomor Rekening</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control" name="pbb_c_src_extacc" id="pbb_c_src_extacc">
                            </div>
                        </div>
                    </div>
                    <div class="row m-3">
                        <label class="col-form-label col-sm-4">Tahun</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control" name="pbb_c_tahun" id="pbb_c_tahun">
                            </div>
                        </div>
                    </div>
                    <div class="row m-3">
                        <label class="col-form-label col-sm-4">NOP</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control required" placeholder="Masukan NOP" name="pbb_c_nop"
                                    id="pbb_c_nop">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="btnCekNop">Cari</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row invisible m-3" id="rNama">
                        <label class="col-form-label col-sm-4">Nama Wajib Pajak</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control" name="pbb_c_nop_name" id="pbb_c_nop_name" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row invisible m-3" id="rSurat">
                        <label class="col-form-label col-sm-4">Jenis Surat</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="jenis_surat" id="jenis_surat">
                                <?php $__currentLoopData = $tJson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama_template); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                        </div>
                    <button class="btn btn-secondary text-right mt-2" type="submit">Generate</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnCekNop').click(function(e) {
                e.preventDefault();

                let accountNumber = $('#pbb_c_src_extacc').val()
                let nop = $('#pbb_c_nop').val()
                let pemdaID = $('#pemda').val()
                let pemdaName = $('#pemda').find('option:selected').text();
                let tahunPajak = $('#pbb_c_tahun').val()

                if (validasiInput()) {

                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(route('pbb.surat-kuasa.detail')); ?>",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            accountNumber: accountNumber,
                            nop: nop,
                            pemdaID: pemdaID,
                            pemdaName: pemdaName,
                            tahunPajak: tahunPajak,
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.rc == '0000') {
                                $("#rNama").removeClass("invisible");
                                $("#rSurat").removeClass("invisible");

                                $('#pbb_c_nop_name').val(response.data.pbb_c_nop_name)
                                $('#pbb_c_lokasi').val(response.data.pbb_c_lokasi)
                                $('#pbb_c_kab_kota').val(response.data.pbb_c_kab_kota)
                                $('#pbb_c_nik').val(response.data.pbb_c_pbb_c_nik)
                                $('#pbb_c_autoblokir_awal_tgl').val(response.data.pbb_c_autoblokir_awal_tgl)
                                $('#pbb_c_autoblokir_akhir_tgl').val(response.data.pbb_c_autoblokir_akhir_tgl)
                                $('#pbb_c_total_amount').val(response.data.pbb_c_total_amount)
                                $('#pbb_c_phone').val(response.data.pbb_c_phone)
                                $('#pbb_c_mail').val(response.data.pbb_c_mail)
                            } else {
                                $("#rNama").addClass("invisible");
                                $("#rSurat").addClass("invisible");
                                $('#nama').val('')
                                $('#pemda').val('')
                                $('#pbb_c_src_extacc').val('')
                                $('#pbb_c_tahun').val('')
                                $('#pbb_c_nop').val('')

                                swal("Gagal", response.message, "warning");
                            }
                        }
                    });
                }
            });
        });

        function validasiInput() {
            var input1 = $('#pemda').val();
            var input2 = $('#pbb_c_tahun').val();
            var input3 = $('#pbb_c_src_extacc').val();
            var input4 = $('pbb_c_nop').val();

            if (input1 === '' || input2 === '' || input3 === '' || input4 === '') {
                // Menampilkan pesan validasi jika salah satu input kosong
                swal("Gagal", "Pemda, Tahun Objek Pajak, Nomor Rekening, NOP Wajib Diisi", "warning");
                return false;
            } else {
                return true;
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/pbb/surat-kuasa/content/list.blade.php ENDPATH**/ ?>