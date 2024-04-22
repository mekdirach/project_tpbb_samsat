<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <label class="col-form-label col-sm-4">Pemda</label>
                <div class="col-sm-12">
                    <select class="custom-select" name="pemda" id="pemda">
                        <option selected value="">- Pilih -</option>
                        @foreach ($pemda as $item)
                            <option value="{{ $item->mp_p_id }}"> {{ $item->mp_p_nama }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <label class="col-form-label col-sm-6">Nomor Rekening</label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control" name="norek" id="norek">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label class="col-form-label col-sm-4">Tahun</label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control" name="tahun" id="tahun">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <label class="col-form-label col-sm-6">NOP</label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control required" placeholder="Masukan NOP" name="nop"
                            id="nop">
                        <span class="input-group-append">
                            <button class="btn btn-primary" type="button" id="btnCekNop">Cari</button>
                        </span>
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
                                <label class="form-label">Nama Pemda</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="nama_pemda" name="nama_pemda">
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
                                        <input type="text" class="form-control" readonly id="nomor_objek_pajak" name="nomor_objek_pajak">
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
                                        <input type="text" class="form-control" readonly id="nama_pajak" name="nama_pajak">
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
                                        <input type="text" class="form-control" readonly id="letak_objek_pajak" name="letak_objek_pajak">
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
                                        <input type="text" class="form-control" readonly id="lokasi" name="lokasi">
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
                                        <input type="text" class="form-control" readonly id="kec" name="kec">
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
                                        <input type="text" class="form-control" readonly id="luas_tb" name="luas_tb">
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
                                        <input type="text" class="form-control" readonly id="tempo" name="tempo">
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
                                        <input type="text" class="form-control" readonly id="nomor_rek" name="nomor_rek">
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
                                        <input type="text" class="form-control" readonly id="jenis_registrasi" name="jenis_registrasi">
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
                                        <input type="text" class="form-control" readonly id="tgl_awal_akhir_blokir" name="tgl_awal_akhir_blokir">
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
                                        <input type="text" class="form-control" readonly id="tgl_rencana_bayar" name="tgl_rencana_bayar">
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
                                        <input type="text" class="form-control" readonly id="periode" name="periode">
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
                                        <input type="text" class="form-control" readonly id="tagihan_total" name="tagihan_total">
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
                                        <input type="text" class="form-control" readonly id="angsuran_berkala" name="angsuran_berkala">
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
                                        <input type="text" class="form-control" readonly id="layanan_notifikasi" name="layanan_notifikasi">
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
                                        <input type="text" class="form-control" readonly id="kontak" name="kontak">
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

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnCekNop').click(function(e) {
                e.preventDefault();
                let accountNumber = $('#norek').val()
                let nop = $('#nop').val()
                let pemdaID = $('#pemda').val()
                let pemdaName = $('#pemda').find('option:selected').text();
                let tahunPajak = $('#tahun').val()

                if (validasiInput()) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('pbb.pembatalan-tpbb.detail') }}",
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
                                $('#modals-default').modal('show');

                                $('#nama_pemda').val(response.data[0].mp_p_nama)
                                $('#luas_tb').val(response.data[0].pbb_c_luas_tanah + ' / ' + response.data[0].pbb_c_luas_bangunan)
                                $('#nomor_objek_pajak').val(response.data[0].pbb_c_nop)
                                $('#nama_pajak').val(response.data[0].pbb_c_nop_name)
                                $('#letak_objek_pajak').val(response.data[0].pbb_c_lokasi)
                                $('#lokasi').val(response.data[0].pbb_c_lokasi)
                                $('#tempo').val(response.data[0].pbb_c_settle_date)
                                $('#nomor_rek').val(response.data[0].pbb_c_src_extacc)
                                $('#jenis_registrasi').val(response.data[0].pbb_c_reg_type)
                                $('#kec').val(response.data[0].pbb_c_kecamatan)
                                $('#kel').val(response.data[0].pbb_c_kelurahan)
                                $('#tagihan_total').val('Rp ' + number_format(response.data[0].pbb_c_total_amount))
                                $('#tgl_awal_akhir_blokir').val(response.data[0].pbb_c_autoblokir_awal_tgl + ' - ' + response.data[0].pbb_c_autoblokir_akhir_tgl)
                                $('#tgl_rencana_bayar').val(response.data[0].pbb_c_pajak_tgl_rencana_bayar)
                                $('#periode').val(response.data[0].pbb_c_jumlah_periode)
                                $('#angsuran_berkala').val('Rp ' + number_format(response.data[0].pbb_c_nominal_setoran))
                                $('#layanan_notifikasi').val(response.data[0].layanan_notifikasi)
                                $('#kontak').val(response.data[0].pbb_c_phone + ' - ' + response.data[0].pbb_c_mail)
                            } else {
                                swal("Gagal", response.message, "warning");
                            }
                        }
                    });
                }
            });

            $('#btnModalPembatalan').click(function(e) {
                e.preventDefault();
                let accountNumber = $('#norek').val()
                let nop = $('#nop').val()
                let pemdaID = $('#pemda').val()
                let pemdaName = $('#pemda').find('option:selected').text();
                let tahunPajak = $('#tahun').val()
                let notes = $('#alasan').val()

                if (notes.length > 0) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('pbb.pembatalan-tpbb.update') }}",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            accountNumber: accountNumber,
                            nop: nop,
                            pemdaID: pemdaID,
                            pemdaName: pemdaName,
                            tahunPajak: tahunPajak,
                            notes: notes
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.rc == '0000') {
                                $('#modals-default').modal('hide');
                                swal("Sukses", response.message, "success");
                            } else {
                                swal("Gagal", response.message, "warning");
                            }
                        }
                    });
                } else {
                    swal("Gagal", "Alasan Pembatalan Wajib Diisi", "warning");
                }
            });
        });

        function validasiInput() {
            var input1 = $('#pemda').val();
            var input2 = $('#tahun_pajak').val();
            var input3 = $('#norek').val();
            var input4 = $('#nop').val();

            if (input1 === '' || input2 === '' || input3 === '' || input4 === '') {
                // Menampilkan pesan validasi jika salah satu input kosong
                swal("Gagal", "Pemda, Tahun Objek Pajak, Nomor Rekening, NOP Wajib Diisi", "warning");
                return false;
            } else {
                return true;
            }
        }
    </script>
@endpush
