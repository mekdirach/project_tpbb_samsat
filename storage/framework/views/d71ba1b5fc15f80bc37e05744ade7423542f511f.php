<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <label class="col-form-label col-sm-4">Jenis Kendaraan</label>
                <div class="col-sm-12">
                    <select class="custom-select" name="jenis_kendaraan" id="jenis_kendaraan">
                        <option selected value="">- Pilih -</option>
                        <option value="MOTOR">Motor</option>
                        <option value="MOBIL">Mobil</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <label class="col-form-label col-sm-6">Tahun Pajak</label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control required" placeholder="Masukan Tahun" name="tahun_pajak"
                            id="tahun_pajak">
                        <span class="input-group-append">
                            <button class="btn btn-primary" type="button" id="btnCekNopol">Cari</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label class="col-form-label col-sm-6">Nomor Polisi</label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control" name="nopol" id="nopol">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-default fade" id="modals-default">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="form-modal">
            <div class="modal-header">
                <h5 class="modal-title">
                    Detail
                    <span class="font-weight-light">Pembatalan</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">NIK / NPWP</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="nik" name="nik">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nama Pemilik</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="owner" name="owner">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Kepemilikan Ke</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="kepemilikan" name="kepemilikan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Jatuh Tempo Kendaraan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="jatuh_tempo" name="jatuh_tempo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nama Nasabah</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="nama_nasabah" name="nama_nasabah">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">CIF</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="cif" name="cif">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Account Type</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="acc_type" name="acc_type">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Currency</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="currency" name="currency">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">No. HP</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="no_hp" name="no_hp">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Alamat</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="alamat" name="alamat">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">No. Referensi</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="no_ref" name="no_ref">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nominal Blokir</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="nominal_blokir" name="nominal_blokir">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Total Tagihan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="total" name="total">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Alasan Pembatalan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                       <textarea name="alasan" id="alasan" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnModalPembatalan">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnCekNopol').click(function (e) {
            e.preventDefault();
            let jenisKendaraan = $('#jenis_kendaraan').val()
            let nopol = $('#nopol').val()
            let tahun = $('#tahun_pajak').val()

            if (validasiInput()) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('bjb-t-samsat.pembatalan.detail')); ?>",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        jenis_kendaraan : jenisKendaraan,
                        nopol : nopol,
                        tahun_pajak : tahun,
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.rc == '0000') {
                            $('#modals-default').modal('show');

                            $('#nik').val(response.data[0].nik)
                            $('#owner').val(response.data[0].nm_pemilik)
                            $('#kepemilikan').val(response.data[0].milik_ke)
                            $('#jatuh_tempo').val(response.data[0].pajak_tgl_jatuh_tempo)
                            $('#nama_nasabah').val(response.data[0].rekening_nama)
                            $('#cif').val(response.data[0].rekening_internal)
                            $('#acc_type').val(response.data[0].account_type)
                            $('#currency').val(response.data[0].currency)
                            $('#no_hp').val(response.data[0].notif_phone)
                            $('#alamat').val(response.data[0].al_pemilik)
                            $('#no_ref').val(response.data[0].reference_number)
                            $('#nominal_blokir').val('Rp ' + number_format(response.data[0].nominal_setoran))
                            $('#total').val('Rp ' + number_format(response.data[0].pajak_total_tagihan))

                        } else {
                            swal("Gagal", response.message, "warning");
                            $('#nik').val('')
                            $('#owner').val('')
                            $('#kepemilikan').val('')
                            $('#jatuh_tempo').val('')
                            $('#nama_nasabah').val('')
                            $('#cif').val('')
                            $('#acc_type').val('')
                            $('#currency').val('')
                            $('#no_hp').val('')
                            $('#alamat').val('')
                            $('#no_ref').val('')
                            $('#nominal_blokir').val('')
                            $('#total').val('')
                        }
                    }
                });
            }
        });

            $('#btnModalPembatalan').click(function(e) {
                e.preventDefault();
                let nopol = $('#nopol').val()
                let tahunPajak = $('#tahun_pajak').val()
                let notes = $('#alasan').val()

                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('bjb-t-samsat.pembatalan.update')); ?>",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        nopol: nopol,
                        tahunPajak: tahunPajak,
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.responseCode == '0000') {
                            $('#nopol').val('')
                            $('#tahun_pajak').val('')
                            $('#jenis_kendaraan').val('')
                            $('#modals-default').modal('hide');
                            
                            swal("Sukses", response.responseDesc, "success");
                        } else {
                            swal("Gagal", response.responseDesc, "warning");
                        }
                    }
                });
            });
        });

        function validasiInput() {
            var input1 = $('#nopol').val()
            var input2 = $('#tahun_pajak').val();
            var input3 = $('#jenis_kendaraan').val();

            if (input1 === '' || input2 === '' || input3 === '') {
                // Menampilkan pesan validasi jika salah satu input kosong
                swal("Gagal", "Jenis Kendaraan, Nomor Polisi, Tahun Pajak Wajib Diisi", "warning");
                return false;
            } else {
                return true;
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/t-samsat/bjb-tsamsat/pembatalan/content/list.blade.php ENDPATH**/ ?>