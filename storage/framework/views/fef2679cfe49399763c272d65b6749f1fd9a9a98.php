<form id="smartwizard-6" action="javascript:void(0)">
    <ul class="card px-4 pt-3 mb-3">
        <li>
            <a href="#smartwizard-6-step-1" class="mb-3">
                <span class="sw-done-icon ion ion-md-checkmark"></span>
                <span class="sw-number">1</span>
                <div class="text-muted small">Input Data</div>
                Rekening Sumber
            </a>
        </li>
        <li>
            <a href="#smartwizard-6-step-2" class="mb-3">
                <span class="sw-done-icon ion ion-md-checkmark"></span>
                <span class="sw-number">2</span>
                <div class="text-muted small">Input Data</div>
                Nomor Objek Pajak
            </a>
        </li>
        <li>
            <a href="#smartwizard-6-step-3" class="mb-3">
                <span class="sw-done-icon ion ion-md-checkmark"></span>
                <span class="sw-number">3</span>
                <div class="text-muted small">Input Data</div>
                Informasi Tabungan
            </a>
        </li>
        <li>
            <a href="#smartwizard-6-step-4" class="mb-3">
                <span class="sw-done-icon ion ion-md-checkmark"></span>
                <span class="sw-number">4</span>
                <div class="text-muted small">Input Data</div>
                Registrasi Tabungan
            </a>
        </li>
    </ul>

    <div class="mb-3">
        <div id="smartwizard-6-step-1" class="card animated fadeIn">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Rekening</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" placeholder="Masukan Nomor Rekening" name="norek" id="norek">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary" type="button" id="btnCekNorek">Cari</button>
                                        </span>
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
                                        <input type="text" class="form-control required" id="nama_nasabah" readonly>
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
                                        <input type="text" class="form-control required" id="tipe_acc" name="tipe_acc" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Ponsel</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" id="no_ponsel" name="no_ponsel" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Email</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" id="email" name="email" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="cif" id="cif">
                        <input type="hidden" name="internal_acc" id="internal_acc">
                    </div>
                </div>
            </div>
        </div>
        <div id="smartwizard-6-step-2" class="card animated fadeIn">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Pemda</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <select class="custom-select required" id="pemda" name="pemda">
                                        <option value="">- Pilih -</option>
                                        <?php $__currentLoopData = $pemda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->mp_p_id); ?>"> <?php echo e($item->mp_p_nama); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Tahun Objek Pajak</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" id="tahun_pajak" name="tahun_pajak">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Objek Pajak</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" placeholder="Masukan Nomor Objek Pajak" id="nop" name="nop">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary" type="button" id="btnCekNop">Cari</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nama Wajib Pajak</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nama_wajib_pajak" name="nama_wajib_pajak">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Lokasi Objek Pajak</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="lokasi_pajak" name="lokasi_pajak">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Kecamatan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="kecamatan" name="kecamatan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Kelurahan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="kelurahan" name="kelurahan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Luas Tanah</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="luas_tanah" name="luas_tanah">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Luas Bangunan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="luas_bangunan" name="luas_bangunan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nominal Pembayaran</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="nominal_pembayaran" name="nominal_pembayaran">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Jatuh Tempo</label>
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
                                <label class="form-label">Denda</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="denda" name="denda">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Potongan/Diskon</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="potongan" name="potongan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Biaya Admin</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="fee" name="fee">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Total Pembayaran</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="total" name="total">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="smartwizard-6-step-3" class="card animated fadeIn">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Rekening</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nomor_rekening" name="nomor_rekening">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Objek Pajak</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nomor_pajak" name="nomor_pajak">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Jenis Registrasi</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <select class="custom-select required" name="type_reg" id="type_reg">
                                        <option value="">- Pilih -</option>
                                        <option value="SEKALIGUS">Pembayaran Sekaligus</option>
                                        <option value="BERKALA">Pembayaran Berkala</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="tgl_bayar">
                            <div class="col-3">
                                <label class="form-label">Tgl Rencana Bayar</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="text" id="b-m-dtp-date_bayar" class="form-control required" placeholder="Date" name="b-m-dtp-date_bayar">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="tgl_awal_blokir">
                            <div class="col-3">
                                <label class="form-label">Tgl Awal Blokir</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="text" id="b-m-dtp-date_awal_blokir" class="form-control required" placeholder="Date" name="b-m-dtp-date_awal_blokir">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="tgl_akhir_blokir">
                            <div class="col-3">
                                <label class="form-label">Tgl Akhir Blokir</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="text" id="b-m-dtp-date_akhir_blokir" class="form-control required" placeholder="Date" name="b-m-dtp-date_akhir_blokir">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Tgl Jatuh Tempo</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="tgl_jatuh_tempo" name="tgl_jatuh_tempo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Jumlah Tagihan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="jml_tagihan" name="jml_tagihan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Layanan Notifikasi</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <select class="custom-select required" name="type_notif" id="type_notif">
                                        <option value="">- Pilih -</option>
                                        <option value="1">SMS</option>
                                        <option value="2">Email</option>
                                        <option value="3">SMS & Email</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Ponsel</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required number-only" id="phone" name="phone" minlength="11" maxlength="13">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Alamat Email</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="email" class="form-control required" id="alamat_email" name="alamat_email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="total_h" id="total_h">
                        <input type="hidden" name="settleDate" id="settleDate">
                        <input type="hidden" name="customerProvince" id="customerProvince">
                        <input type="hidden" name="provinsiPajak" id="provinsiPajak">
                        <input type="hidden" name="kabKotaPajak" id="kabKotaPajak">
                        <input type="hidden" name="nik" id="nik">
                    </div>
                </div>
            </div>
        </div>
        <div id="smartwizard-6-step-4" class="card animated fadeIn">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nama Pemda</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nama_pemda" name="nama_pemda">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Objek Pajak</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nomor_objek_pajak" name="nomor_objek_pajak">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nama Wajib Pajak</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nama_pajak" name="nama_pajak">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Letak Objek Pajak</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="letak_objek_pajak" name="letak_objek_pajak">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Lokasi</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="lokasi" name="lokasi">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Kecamatan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="kec" name="kec">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Kelurahan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="kel" name="kel">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Luas Tanah / Bangunan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="luas_tb" name="luas_tb">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Tgl Jatuh Tempo</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="tempo" name="tempo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Rekening</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nomor_rek" name="nomor_rek">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Jenis Registrasi</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="jenis_registrasi" name="jenis_registrasi">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Tgl Awal & Akhir Blokir</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="tgl_awal_akhir_blokir" name="tgl_awal_akhir_blokir">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Tgl Rencana Bayar</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="tgl_rencana_bayar" name="tgl_rencana_bayar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Jumlah Periode</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="periode" name="periode">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Jumlah Tagihan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="tagihan_total" name="tagihan_total">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Angsuran Berkala</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="angsuran_berkala" name="angsuran_berkala">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Layanan Notifikasi</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="layanan_notifikasi" name="layanan_notifikasi">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Ponsel & Email</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="kontak" name="kontak">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="btn-simulasi">
                    <button class="btn btn-secondary mt-2" id="btnSimulasi">Simulasi</button>
                </div>
                <input id="link" hidden value="<?php echo e(route('approval')); ?>">
            </div>
        </div>
    </div>
</form>

<div class="modal modal-top fade" id="modals-simulasi">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title custom-title">Simulasi
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <thead class="thead-grey">
                      <tr id="tableHeader">
                        <th>Periode</th>
                        <th>Tanggal Blokir</th>
                        <th>Nominal Blokir</th>
                        <th>Total Blokir</th>
                      </tr>
                    </thead>
                    <tbody id="tbody_simulasi">
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //Tanggal
        $('#b-m-dtp-date_bayar').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            clearButton: true
        });

        $('#b-m-dtp-date_awal_blokir').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            clearButton: true
        });

        $('#b-m-dtp-date_akhir_blokir').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            clearButton: true
        });

        //Masking input number
        $('.number-only').on('keypress', function(evt){
            if(evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57){
                evt.preventDefault()
            }
        })

        //Jenis Registrasi
        $("#type_reg").change(function() {
            var selectedOption = $(this).val();
            $('#jenis_registrasi').val(selectedOption)

            if (selectedOption === "SEKALIGUS") {
                $("#b-m-dtp-date_bayar").val("");
                $("#b-m-dtp-date_akhir_blokir").val("");
                $("#b-m-dtp-date_awal_blokir").val("");

                $("#tgl_bayar").show()
                $("#tgl_awal_blokir").hide()
                $("#tgl_akhir_blokir").hide()
                $("#btn-simulasi").hide()

                $("#b-m-dtp-date_bayar").addClass("required");
                $("#b-m-dtp-date_akhir_blokir").removeClass("required");
                $("#b-m-dtp-date_awal_blokir").removeClass("required");

                $('#periode').val('').removeClass("required")
                $("#angsuran_berkala").val("").removeClass("required");
                $("#tgl_awal_akhir_blokir").val("").removeClass("required");
            } else if (selectedOption === "BERKALA") {
                $("#b-m-dtp-date_bayar").val("");
                $("#b-m-dtp-date_akhir_blokir").val("");
                $("#b-m-dtp-date_awal_blokir").val("");

                $("#tgl_bayar").show()
                $("#tgl_awal_blokir").show()
                $("#tgl_akhir_blokir").show()
                $("#btn-simulasi").show()

                $("#b-m-dtp-date_bayar").addClass("required");
                $("#b-m-dtp-date_akhir_blokir").addClass("required");
                $("#b-m-dtp-date_awal_blokir").addClass("required");

            }
        });

        //Tipe Notifikasi
        $("#type_notif").change(function() {
            var selectedOption = $(this).val();
            var selectedText = $('#type_notif').find(":selected").text();
            $('#layanan_notifikasi').val(selectedText);

            if (selectedOption === "1") {
                $("#phone").addClass("required");
                $("#alamat_email").removeClass("required");
            } else if (selectedOption === "2") {
                $("#alamat_email").addClass("required");
                $("#phone").removeClass("required");
            } else if (selectedOption === "3") {
                $("#phone").addClass("required");
                $("#alamat_email").addClass("required");
            }
        });

        //tanggal rencana bayar
        $('#b-m-dtp-date_bayar').on('change', function () {
            var val = $(this).val();
            $('#tgl_rencana_bayar').val(val)
        });

        //kontak
        $('#phone, #alamat_email').on('change', function () {
            var phone = $('#phone').val();
            var alamat_email = $('#alamat_email').val();
            $('#kontak').val(phone + ' & ' + alamat_email)
        });

        //tanggal blokir
        $('#b-m-dtp-date_akhir_blokir, #b-m-dtp-date_awal_blokir').on('change', function () {
            var awal_blokir = $('#b-m-dtp-date_awal_blokir').val()
            var akhir_blokir = $('#b-m-dtp-date_akhir_blokir').val()

            var awal = new Date(awal_blokir)
            var akhir = new Date(akhir_blokir)

            // if (akhir - awal < 3 * 30 * 24 * 60 * 60 * 1000) {
            //     swal("Info", "Jangka waktu menabung pajak pbb tidak boleh kurang dari 3 bulan", "info")
            //     $('#b-m-dtp-date_akhir_blokir').val('')
            // }
            var getDateAwal = awal.getDate()
            var getDateAkhir = akhir.getDate()

            if (getDateAwal == '29' || getDateAwal == '30' || getDateAwal == '31') {
                swal("Info", "Tanggal awal blokir harus tanggal 1 - 28", "info")
                $('#b-m-dtp-date_awal_blokir').val('')
            }

            if (getDateAkhir == '29' || getDateAkhir == '30' || getDateAkhir == '31') {
                swal("Info", "Tanggal akhir blokir harus tanggal 1 - 28", "info")
                $('#b-m-dtp-date_akhir_blokir').val('')
            }

            if (akhir_blokir.length > 0) {
                simulasi()
            }
            $('#tgl_awal_akhir_blokir').val(awal_blokir + ' - ' + akhir_blokir)
            $('#periode').val(getMonthDifference(awal_blokir, akhir_blokir))
            $('#angsuran_berkala').val('Rp ' + number_format(parseFloat($('#total_h').val()) / parseFloat($('#periode').val())))
        });

        //Cek Nomor Rekening
        $('#btnCekNorek').click(function (e) {
            e.preventDefault();
            let norek = $('#norek').val()

            if (norek.length > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('pbb.registrasi-tpbb.cek-norek')); ?>",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        norek : norek
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.responseCode == '0000') {
                            $('#nama_nasabah').val(response.data.accountName)
                            $('#tipe_acc').val(response.data.accountType)
                            $('#no_ponsel').val(response.data.phoneNumber)
                            $('#email').val(response.data.email)
                            $('#cif').val(response.data.accountCif)
                            $('#internal_acc').val(response.data.accountInternal)
                            // $('#phone').val(response.data.phoneNumber)
                            // $('#alamat_email').val(response.data.email)
                            $('#nik').val(response.data.nik)
                        } else {
                            swal("Gagal", response.responseDesc, "warning");
                            $('#nama_nasabah').val('')
                            $('#tipe_acc').val('')
                            $('#no_ponsel').val('')
                            $('#email').val('')
                        }
                    }
                });
            } else {
                swal("Gagal", "Nomor Rekening Wajib Diisi", "warning");
            }
        });

         //Cek NOP
         $('#btnCekNop').click(function (e) {
            e.preventDefault();
            let accountNumber = $('#norek').val()
            let nop = $('#nop').val()
            let pemdaID = $('#pemda').val()
            let pemdaName = $('#pemda').find('option:selected').text();
            let tahunPajak = $('#tahun_pajak').val()
            let jenisRegistrasi = $('#type_reg').val()

            if (validasiInputNop()) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('pbb.registrasi-tpbb.cek-nop')); ?>",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        accountNumber : accountNumber,
                        nop : nop,
                        pemdaID : pemdaID,
                        pemdaName : pemdaName,
                        tahunPajak : tahunPajak,
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.responseCode == '0000') {
                            $('#nama_wajib_pajak').val(response.data.customerName)
                            $('#customerProvince').val(response.data.customerProvince)
                            $('#lokasi_pajak').val(response.data.lokasiPajak)
                            $('#kecamatan').val(response.data.kecamatanPajak)
                            $('#kelurahan').val(response.data.kelurahanPajak)
                            $('#luas_tanah').val(response.data.luasTanah)
                            $('#luas_bangunan').val(response.data.luasBangunan)
                            $('#nominal_pembayaran').val('Rp ' + number_format(response.data.nominalPajak))
                            // $('#jatuh_tempo').val(response.data.nHariJthTempo + ' hari')
                            $('#jatuh_tempo').val(response.data.settleDate)
                            $('#denda').val('Rp ' + number_format(response.data.dendaPajak))
                            $('#potongan').val('Rp ' + number_format(response.data.diskonPajak))
                            $('#fee').val('Rp ' + number_format(response.data.biayaAdmin))
                            $('#total').val('Rp ' + number_format(response.data.totalBayar))
                            $('#nomor_rekening').val(accountNumber)
                            $('#nomor_pajak').val(response.data.nop)
                            $('#jml_tagihan').val('Rp ' + number_format(response.data.totalBayar))
                            $('#tgl_jatuh_tempo').val(response.data.settleDate)
                            $('#total_h').val(response.data.totalBayar)
                            $('#settleDate').val(response.data.settleDate)

                            $('#nama_pemda').val(response.data.pemdaName)
                            $('#luas_tb').val(response.data.luasTanah + ' / ' + response.data.luasBangunan)
                            $('#nomor_objek_pajak').val(response.data.nop)
                            $('#nama_pajak').val(response.data.customerName)
                            $('#letak_objek_pajak').val(response.data.lokasiPajak)
                            $('#lokasi').val(response.data.lokasiPajak)
                            $('#tempo').val(response.data.settleDate)
                            $('#nomor_rek').val(response.data.accountNumber)
                            $('#jenis_registrasi').val(jenisRegistrasi)
                            $('#kec').val(response.data.kecamatanPajak)
                            $('#kel').val(response.data.kelurahanPajak)
                            $('#provinsiPajak').val(response.data.provinsiPajak)
                            $('#kabKotaPajak').val(response.data.kabKotaPajak)
                            $('#tagihan_total').val('Rp ' + number_format(response.data.totalBayar))
                        } else {
                            swal("Gagal", response.responseDesc, "warning");
                            $('#nama_wajib_pajak').val('')
                            $('#lokasi_pajak').val('')
                            $('#kecamatan').val('')
                            $('#kelurahan').val('')
                            $('#luas_tanah').val('')
                            $('#luas_bangunan').val('')
                            $('#nominal_pembayaran').val('')
                            $('#jatuh_tempo').val('')
                            $('#denda').val('')
                            $('#potongan').val('')
                            $('#fee').val('')
                            $('#total').val('')
                        }
                    }
                });
            }
        });

        //Simulasi
        $('#btnSimulasi').click(function (e) {
            e.preventDefault();
            $('#tbody_simulasi').empty();

            let pemdaID = $('#pemda').val()
            let totalBayar = $('#total').val()
            let settleDate = $('#settleDate').val()
            let tglAwalBlokir = $('#b-m-dtp-date_awal_blokir').val()
            let tglRencanaBayar = $('#b-m-dtp-date_bayar').val()
            let tglAkhirBlokir = $('#b-m-dtp-date_akhir_blokir').val()

            $.ajax({
                type: "POST",
                url: "<?php echo e(route('pbb.registrasi-tpbb.simulasi')); ?>",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    pemdaID : pemdaID,
                    totalBayar : totalBayar,
                    settleDate : settleDate,
                    tglAwalBlokir : tglAwalBlokir,
                    tglRencanaBayar :tglRencanaBayar,
                    tglAkhirBlokir : tglAkhirBlokir
                },
                success: function (response) {
                    if (response.responseCode === '0000') {
                        var total_blokir = parseFloat(response.data.nominalSetoran)
                        for (var i = 0; i < response.data.jumlahPeriod; i++) {
                            var tgl_blokir = moment(response.data.tglAwalBlokir)

                            if (i === 0) {
                                total_blokir
                            }else {
                                total_blokir += parseFloat(response.data.nominalSetoran)
                            }
                            var newRow = '<tr>' +
                            '<td>' + (i + 1) + '</td>' +
                            '<td>' + tgl_blokir.add(i, 'months').format('YYYY-MM-DD') + '</td>' +
                            '<td>' + number_format(response.data.nominalSetoran) + '</td>' +
                            '<td>' + number_format(total_blokir) + '</td>' +
                            '</tr>';

                            $('#tbody_simulasi').append(newRow);
                        }
                        $('#modals-simulasi').modal('show')
                    } else {
                        swal("Gagal", response.responseDesc, "warning");
                    }
                    console.log(response);
                }
            });
        });
    });

function validasiInputNop() {
    var input1 = $('#pemda').val();
    var input2 = $('#tahun_pajak').val().trim();
    var input3 = $('#nop').val().trim();

    if (input1 === '' || input2 === '' || input3 === '') {
        // Menampilkan pesan validasi jika salah satu input kosong
        swal("Gagal", "Pemda, Tahun Objek Pajak, NOP Tidak Boleh Kosong", "warning");
        return false;
    } else {
        return true;
    }
}

function getMonthDifference(startDate, endDate) {

    var start = new Date(startDate);
    var end = new Date(endDate);

    var months;
    months = (end.getFullYear() - start.getFullYear()) * 12 ;
    months -= start.getMonth();
    months += end.getMonth();

    console.log(months);
    return months <= 0 ? 0 : months;
}

function simulasi() {

    let pemdaID = $('#pemda').val()
    let totalBayar = $('#total').val()
    let settleDate = $('#settleDate').val()
    let tglAwalBlokir = $('#b-m-dtp-date_awal_blokir').val()
    let tglRencanaBayar = $('#b-m-dtp-date_bayar').val()
    let tglAkhirBlokir = $('#b-m-dtp-date_akhir_blokir').val()

    $.ajax({
        type: "POST",
        url: "<?php echo e(route('pbb.registrasi-tpbb.simulasi')); ?>",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            pemdaID : pemdaID,
            totalBayar : totalBayar,
            settleDate : settleDate,
            tglAwalBlokir : tglAwalBlokir,
            tglRencanaBayar :tglRencanaBayar,
            tglAkhirBlokir : tglAkhirBlokir
        },
        success: function (response) {
            if (response.responseCode === '0000') {
                var total_blokir = parseFloat(response.data.nominalSetoran)
                $('#periode').val(response.data.jumlahPeriod)
            } else {
                swal("Gagal", response.responseDesc, "warning");
                $('#b-m-dtp-date_awal_blokir').val('')
                $('#b-m-dtp-date_akhir_blokir').val('')
            }
            console.log(response);
        }
    });
}
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/pbb/registrasi-tpbb/content/registrasi.blade.php ENDPATH**/ ?>