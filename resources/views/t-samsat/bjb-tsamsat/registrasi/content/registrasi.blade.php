<form id="smartwizard-7" action="javascript:void(0)">
    <ul class="card px-4 pt-3 mb-3">
        <li>
            <a href="#smartwizard-6-step-1" class="mb-3">
                <span class="sw-done-icon ion ion-md-checkmark"></span>
                <span class="sw-number">1</span>
                <div class="text-muted small">Input Data</div>
                Nomor Polisi
            </a>
        </li>
        <li>
            <a href="#smartwizard-6-step-2" class="mb-3">
                <span class="sw-done-icon ion ion-md-checkmark"></span>
                <span class="sw-number">2</span>
                <div class="text-muted small">Input Data</div>
                Rekening Sumber
            </a>
        </li>
        <li>
            <a href="#smartwizard-6-step-3" class="mb-3">
                <span class="sw-done-icon ion ion-md-checkmark"></span>
                <span class="sw-number">3</span>
                <div class="text-muted small">Input Data</div>
                Informasi Tagihan
            </a>
        </li>
        <li>
            <a href="#smartwizard-6-step-4" class="mb-3">
                <span class="sw-done-icon ion ion-md-checkmark"></span>
                <span class="sw-number">4</span>
                <div class="text-muted small">Konfirmasi Data</div>
                Registrasi T-Samsat
            </a>
        </li>
    </ul>

    <div class="mb-3">
        <div id="smartwizard-6-step-1" class="card animated fadeIn">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Jenis Kendaraan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <select class="custom-select" id="jenis_kendaraan" name="jenis_kendaraan">
                                        <option value="">- Pilih -</option>
                                        <option value="MOTOR">Motor</option>
                                        <option value="MOBIL">Mobil</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Provinsi</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <select class="custom-select" id="provinsi" name="provinsi">
                                        <option value="">- Pilih -</option>
                                        @foreach ($pemda as $item)
                                            <option value="{{ $item->mp_mp_kode }}"> {{ $item->mp_mp_nama }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Polisi</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Masukan Nomor Polisi" id="no_polisi" name="no_polisi">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary" type="button" id="btnCekNopol" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading ...">Cari</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Rangka</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="no_rangka" name="no_rangka">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Mesin</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="no_mesin" name="no_mesin">
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
                                        <input type="text" class="form-control" readonly id="owner" name="owner">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Merek Kendaraan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="merk" name="merk">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Model Kendaraan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="model" name="model">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Warna Kendaraan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="warna" name="warna">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Tahun Produksi</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="tahun" name="tahun">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Tgl. Pajak Tahunan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="tgl_pajak" name="tgl_pajak">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Masa Berlaku STNK</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="masa_stnk" name="masa_stnk">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nominal BBN</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="nominal_bbn" name="nominal_bbn">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Denda BBN</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="denda_bbn" name="denda_bbn">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nominal PKB</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="nominal_pkb" name="nominal_pkb">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Denda PKB</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="denda_pkb" name="denda_pkb">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nominal SWD</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="nominal_swd" name="nominal_swd">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Denda SWD</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="denda_swd" name="denda_swd">
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
                                <label class="form-label">Nominal TNKB</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="nominal_tnkb" name="nominal_tnkb">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Jumlah Bayar</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="jumlah_bayar" name="jumlah_bayar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="tgl_akhir_pajak_lama" id="tgl_akhir_pajak_lama">
            </div>
        </div>
        <div id="smartwizard-6-step-2" class="card animated fadeIn">
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
                                        <input type="text" class="form-control" placeholder="Masukan Nomor Rekening" name="norek" id="norek">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary" type="button" id="btnCekNorek" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading ...">Cari</button>
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
                                        <input type="text" class="form-control" name="nama_nasabah" id="nama_nasabah" readonly>
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
                                        <input type="text" class="form-control" id="cif" name="cif" readonly>
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
                                        <input type="text" class="form-control" id="tipe_acc" name="tipe_acc" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Currency</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="currency" name="currency" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">No. HP</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" readonly>
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
                                        <input type="text" class="form-control" id="email" name="email" readonly>
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
                                <label class="form-label">Jenis Registrasi</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <select class="custom-select" name="type_reg" id="type_reg">
                                        <option value="">- Pilih -</option>
                                        <option value="SEKALIGUS">Pembayaran Sekaligus</option>
                                        <option value="BERKALA">Pembayaran Berkala</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="tgl_auto_blokir">
                            <div class="col-3">
                                <label class="form-label">Tgl. Auto Blokir</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="text" id="tgl_autoblokir" class="form-control" placeholder="Date" name="tgl_autoblokir">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Informasi Tagihan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="informasi" name="informasi">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="rNominal">
                            <div class="col-3">
                                <label class="form-label">Nominal Blokir</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly name="nominal_blokir" id="nominal_blokir">
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
                                        <input type="text" class="form-control" readonly id="jumlah_tagihan" name="jumlah_tagihan">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <label class="form-label">Nomor Rekening</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="no_rekening" name="no_rekening">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">NIK</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nik" name="nik">
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
                                        <input type="text" class="form-control required" readonly id="nama-nasabah" name="nama-nasabah">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Rangka</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="no-rangka" name="no-rangka">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nomor Mesin</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="no-mesin" name="no-mesin">
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
                                        <input type="text" class="form-control required" readonly id="kepemilikan" name="kepemilikan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Merek Kendaraan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="merek-kendaraan" name="merek-kendaraan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Model Kendaraan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="model-kendaraan" name="model-kendaraan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Warna Kendaraan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="warna-kendaraan" name="warna-kendaraan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Tahun Produksi</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="tahun-produksi" name="tahun-produksi">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Tgl. Pajak Tahunan</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="tgl-pajak" name="tgl-pajak">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Masa Berlaku STNK</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="masa-stnk" name="masa-stnk">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nominal BBN</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nominal-bbn" name="nominal-bbn">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Denda BBN</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="denda-bbn" name="denda-bbn">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nominal PKB</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nominal-pkb" name="nominal-pkb">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Denda PKB</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="denda-pkb" name="denda-pkb">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nominal SWD</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nominal-swd" name="nominal-swd">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Denda SWD</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="denda-swd" name="denda-swd">
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
                                        <input type="text" class="form-control required" readonly id="biaya-admin" name="biaya-admin">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Nominal TNKB</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control required" readonly id="nominal-tnkb" name="nominal-tnkb">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Jumlah Bayar</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="jumlah-bayar" name="jumlah-bayar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Periode Autoblokir</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="periode-blokir" name="periode-blokir">
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
                                        <input type="text" class="form-control" readonly id="angsuran-berkala" name="angsuran-berkala">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="btn-simulasi">
                    <button class="btn btn-secondary mt-2" id="btnSimulasi">Simulasi</button>
                </div>
                <input id="link" hidden value="{{route('approval-samsat')}}">
                <input type="hidden" name="warna-plat" id="warna-plat">
                <input type="hidden" name="alamat" id="alamat">
                <input type="hidden" name="nomor-id" id="nomor-id">
                <input type="hidden" name="nomor-bpkb" id="nomor-bpkb">
                <input type="hidden" name="kode-wilayah" id="kode-wilayah">
                <input type="hidden" name="kode-bayar" id="kode-bayar">
                <input type="hidden" name="kode-flat" id="kode-flat">
                <input type="hidden" name="acc-internal" id="acc-internal">
                <input type="hidden" name="tgl-blokir" id="tgl-blokir">
                <input type="hidden" name="status-aro" id="status-aro" value="0">
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
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //Tanggal

        $('#tgl_autoblokir').bootstrapMaterialDatePicker({
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

                $("#tgl_autoblokir").val(getDate());
                $("#tgl-blokir").val(getDate());

                $("#tgl_bayar").show()
                $("#tgl_auto_blokir").hide()
                $("#rNominal").hide()
                $("#btn-simulasi").hide()

                $("#tgl_autoblokir").removeClass("required");
            } else if (selectedOption === "BERKALA") {
                $("#tgl_autoblokir").val('');

                $("#tgl_bayar").show()
                $("#tgl_auto_blokir").show()
                $("#rNominal").show()
                $("#btn-simulasi").show()

                // $("#tgl_autoblokir").addClass("required");
            }
        });

        //tanggal blokir
        $('#tgl_autoblokir').on('change', function () {
            var tgl_blokir = $('#tgl_autoblokir').val()
            var tanggal = new Date(tgl_blokir)
            var getDateBlokir = tanggal.getDate()

            if (getDateBlokir == '29' || getDateBlokir == '30' || getDateBlokir == '31') {
                swal("Info", "Tanggal autoblokir harus tanggal 1 - 28", "info")
                $('#tgl_autoblokir').val('')
            } else {
                $('#tgl_autoblokir').val()
                $("#tgl-blokir").val($('#tgl_autoblokir').val())
            }

            if (tgl_blokir.length > 0) {
                simulasi()
            }

            // $('#tgl_awal_akhir_blokir').val(awal_blokir + ' - ' + akhir_blokir)
            // $('#periode').val(getMonthDifference(awal_blokir, akhir_blokir))
            // $('#angsuran_berkala').val('Rp ' + number_format(parseFloat($('#total_h').val()) / parseFloat($('#periode').val())))
        });

        //Cek Nomor Rekening
        $('#btnCekNorek').click(function (e) {
            e.preventDefault();
            var btn = $('#btnCekNorek')
            var originalText = btn.html();
            var loadingText = btn.data('loading-text');

            let norek = $('#norek').val()

            if (norek.length > 0) {
                btn.html(loadingText).prop('disabled', true);

                $.ajax({
                    type: "POST",
                    url: "{{ route('pbb.registrasi-tpbb.cek-norek') }}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        norek : norek
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.responseCode == '0000') {
                            $('#nama_nasabah').val(response.data.accountName)
                            $('#tipe_acc').val(response.data.accountType)
                            $('#no_hp').val(response.data.phoneNumber)
                            $('#email').val(response.data.email)
                            $('#cif').val(response.data.accountCif)
                            $('#currency').val(response.data.accountCurrency)

                            $('#no_rekening').val(norek)
                            $('#nik').val(response.data.nik)
                            $('#nama-nasabah').val(response.data.accountName)
                            $('#acc-internal').val(response.data.accountInternal)

                        } else {
                            swal("Gagal", response.responseDesc, "warning");
                            $('#nama_nasabah').val('')
                            $('#tipe_acc').val('')
                            $('#no_hp').val('')
                            $('#email').val('')
                            $('#currency').val('')
                        }

                        btn.html(originalText);
                        btn.prop('disabled', false);
                    }
                });
            } else {
                swal("Gagal", "Nomor Rekening Wajib Diisi", "warning");
            }
        });

         //Cek Nopol
         $('#btnCekNopol').click(function (e) {
            e.preventDefault();
            var btn = $('#btnCekNopol')
            var originalText = btn.html();
            var loadingText = btn.data('loading-text');

            let jenisKendaraan = $('#jenis_kendaraan').val()
            let nopol = $('#no_polisi').val()
            let pemdaID = $('#pemda').val()

            if (validasiInputNop()) {
                btn.html(loadingText).prop('disabled', true);

                $.ajax({
                    type: "POST",
                    url: "{{ route('bjb-t-samsat.registrasi-samsat.cek-nopol') }}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        jenisKendaraan : jenisKendaraan,
                        nopol : nopol,
                        pemdaID : pemdaID,
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.responseCode == '0000') {
                            $('#no_rangka').val(response.data.nomorRangka)
                            $('#no_mesin').val(response.data.nomorMesin)
                            $('#owner').val(response.data.namaPemilik)
                            $('#merk').val(response.data.namaMerekKB)
                            $('#model').val(response.data.namaModelKB)
                            $('#warna').val(response.data.warnaKB)
                            $('#tahun').val(response.data.tahunBuatan)
                            $('#tgl_pajak').val(response.data.tglAkhirPajakBaru)
                            $('#tgl_akhir_pajak_lama').val(response.data.tglAkhirPajakLama)
                            $('#masa_stnk').val(response.data.tahunPajak)
                            $('#nominal_bbn').val('Rp ' + number_format(response.data.pokokBbn))
                            $('#denda_bbn').val('Rp ' + number_format(response.data.dendaBBN))
                            $('#nominal_pkb').val('Rp ' + number_format(response.data.pokokPKB))
                            $('#denda_pkb').val('Rp ' + number_format(response.data.dendaPKB))
                            $('#nominal_swd').val('Rp ' + number_format(response.data.pokokSWD))
                            $('#denda_swd').val('Rp ' + number_format(response.data.dendaSWD))
                            $('#fee').val('Rp ' + number_format(response.data.pokokAdmSTNK))
                            $('#nominal_tnkb').val('Rp ' + number_format(response.data.pokokAdmTNKB))
                            $('#jumlah_bayar').val('Rp ' + number_format(response.data.jumlah))
                            $('#jumlah_tagihan').val('Rp ' + number_format(response.data.jumlah))

                            $('#warna-plat').val(response.data.warnaPlat)
                            $('#alamat').val(response.data.alamatPemilik)
                            $('#kode-wilayah').val(response.data.kodeWilayah)
                            $('#kode-bayar').val(response.data.kodeBayar)
                            $('#kode-flat').val(response.data.kodeFlat)
                            $('#nomor-id').val(response.data.nomorIdentitas)
                            $('#nomor-bpkb').val(response.data.nomorBPKB)
                            $('#no-rangka').val(response.data.nomorRangka)
                            $('#no-mesin').val(response.data.nomorMesin)
                            $('#kepemilikan').val(response.data.milikKe)
                            $('#merek-kendaraan').val(response.data.namaMerekKB)
                            $('#model-kendaraan').val(response.data.namaModelKB)
                            $('#warna-kendaraan').val(response.data.warnaKB)
                            $('#tahun-produksi').val(response.data.tahunBuatan)
                            $('#tgl-pajak').val(response.data.tglAkhirPajakBaru)
                            $('#masa-stnk').val(response.data.tahunPajak)
                            $('#nominal-bbn').val('Rp ' + number_format(response.data.pokokBbn))
                            $('#denda-bbn').val('Rp ' + number_format(response.data.dendaBBN))
                            $('#nominal-pkb').val('Rp ' + number_format(response.data.pokokPKB))
                            $('#denda-pkb').val('Rp ' + number_format(response.data.dendaPKB))
                            $('#nominal-swd').val('Rp ' + number_format(response.data.pokokSWD))
                            $('#denda-swd').val('Rp ' + number_format(response.data.dendaSWD))
                            $('#biaya-admin').val('Rp ' + number_format(response.data.pokokAdmSTNK))
                            $('#nominal-tnkb').val('Rp ' + number_format(response.data.pokokAdmTNKB))
                            $('#jumlah-bayar').val('Rp ' + number_format(response.data.jumlah))

                        } else {
                            swal("Gagal", response.responseDesc, "warning");
                            $('#no_rangka').val('')
                            $('#no_mesin').val('')
                            $('#owner').val('')
                            $('#merk').val('')
                            $('#model').val('')
                            $('#warna').val('')
                            $('#tahun').val('')
                            $('#tgl_pajak').val('')
                            $('#masa_stnk').val('')
                            $('#nominal_bbn').val('')
                            $('#denda_bbn').val('')
                            $('#nominal_pkb').val('')
                            $('#denda_pkb').val('')
                            $('#nominal_swd').val('')
                            $('#denda_swd').val('')
                            $('#fee').val('')
                            $('#nominal_tnkb').val('')
                            $('#jumlah_bayar').val('')
                        }

                        btn.html(originalText);
                        btn.prop('disabled', false);
                    }
                });
            }
        });

        //Simulasi
        $('#btnSimulasi').click(function (e) {
            e.preventDefault();
            $('#tbody_simulasi').empty();

            let tglBlokir = $('#tgl_autoblokir').val()
            let tglAkhirPajakLama = $('#tgl_akhir_pajak_lama').val()
            let jumlah = $('#jumlah_bayar').val()

            $.ajax({
                type: "POST",
                url: "{{ route('bjb-t-samsat.registrasi-samsat.simulasi') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    tglBlokir : tglBlokir,
                    tglAkhirPajakLama : tglAkhirPajakLama,
                    jumlah : jumlah,
                },
                success: function (response) {
                    if (response.responseCode === '0000') {
                        var total_blokir = parseFloat(response.data.nominalSetoran)
                        var data = ''
                        for (let j = 0; j < response.data.listBlokir.length; j++) {
                            data = response.data.listBlokir[j]

                            var newRow = '<tr>' +
                            '<td>' + (j + 1) + '</td>' +
                            '<td>' + data.tglBlokir + '</td>' +
                            '<td>' + number_format(data.nominalBlokir) + '</td>' +
                            '<td>' + number_format(data.totalBlokir) + '</td>' +
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
    var input2 = $('#jenis_kendaraan').val().trim();
    var input3 = $('#no_polisi').val().trim();

    if (input1 === '' || input2 === '' || input3 === '') {
        // Menampilkan pesan validasi jika salah satu input kosong
        swal("Gagal", "Jenis Kendaraan, Provinsi, Nomor Polisi Wajib Diisi", "warning");
        return false;
    } else {
        return true;
    }
}

function getDate() {

    var tgl_blokir = new Date().toLocaleDateString('en-CA');

    return tgl_blokir;
}

function simulasi() {

    let tglBlokir = $('#tgl_autoblokir').val()
    let tanggal = new Date(tglBlokir)
    let getDateBlokir = tanggal.getDate()

    let tglAkhirPajakLama = $('#tgl_akhir_pajak_lama').val()
    let jumlah = $('#jumlah_bayar').val()

    $.ajax({
        type: "POST",
        url: "{{ route('bjb-t-samsat.registrasi-samsat.simulasi') }}",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            tglBlokir : tglBlokir,
            tglAkhirPajakLama : tglAkhirPajakLama,
            jumlah : jumlah,
        },
        success: function (response) {
            if (response.responseCode === '0000') {
                $('#nominal_blokir').val('Rp ' + number_format(response.data.nominalSetoran))
                $('#jumlah_tagihan').val('Rp ' + number_format(response.data.jumlah))
                $('#periode-blokir').val(response.data.jumlahPeriod)
                $('#angsuran-berkala').val('Rp ' + number_format(response.data.nominalSetoran))
            } else {
                swal("Gagal", response.responseDesc, "warning");
                $('#nominal_blokir').val('')
                $('#jumlah_tagihan').val('')
                $('#tgl_autoblokir').val('')
            }
            console.log(response);
        }
    });
}
</script>
@endpush
