<div class="card">
    <div class="card-body">
        <form action="{{ route('pbb.surat-kuasa.generate-docx') }}" method="post">
            @csrf
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
                            <select class="custom-select" name="kode_provinsi" id="kode_provinsi">
                                <option selected value="">- Pilih -</option>
                                @foreach ($pemda as $item)
                                    <option value="{{ $item->mp_mp_kode }}"> {{ $item->mp_mp_nama }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row m-3">
                        <label class="col-form-label col-sm-4">Nomor Rekening</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control" name="rekening_external" id="rekening_external">
                            </div>
                        </div>
                    </div>
                    <div class="row m-3">
                        <label class="col-form-label col-sm-4">Tahun</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control" name="tahun_pajak" id="tahun_pajak">
                            </div>
                        </div>
                    </div>
                    <div class="row m-3">
                        <label class="col-form-label col-sm-4">Nomor Polisi</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control required" placeholder="Masukan NOP" name="nomor_polisi"
                                    id="nomor_polisi">
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
                                <input type="text" class="form-control" name="nm_pemilik" id="nm_pemilik" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row invisible m-3" id="rSurat">
                        <label class="col-form-label col-sm-4">Jenis Surat</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="jenis_surat" id="jenis_surat">
                                @foreach ($tJson as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_template }}</option>
                                @endforeach
                                {{-- <option value="pembatalan">Surat Pembatalan</option>
                                <option value="autoblokir">Surat Kuasa Autoblokir</option>
                                <option value="sekaligus">Surat Kuasa Blokir Sekaligus</option> --}}
                            </select>
                        </div>
                    <button class="btn btn-secondary text-right mt-2" type="submit">Generate</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnCekNop').click(function(e) {
                e.preventDefault();

                let accountNumber = $('#rekening_external').val()
                let nopol = $('#nomor_polisi').val()
                let pemdaID = $('#kode_provinsi').val()
                let pemdaName = $('#kode_provinsi').find('option:selected').text();
                let tahunPajak = $('#tahun_pajak').val()

                if (validasiInput()) {

                    $.ajax({
                        type: "POST",
                        url: "{{ route('bjb-t-samsat.surat-kuasa.detail') }}",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            accountNumber: accountNumber,
                            nopol: nopol,
                            pemdaID: pemdaID,
                            pemdaName: pemdaName,
                            tahunPajak: tahunPajak,
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.rc == '0000') {
                                $("#rNama").removeClass("invisible");
                                $("#rSurat").removeClass("invisible");

                                $('#nm_pemilik').val(response.data.nm_pemilik)
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
                                $('#kode_provinsi').val('')
                                $('#rekening_external').val('')
                                $('#tahun_pajak').val('')
                                $('#nomor_polisi').val('')

                                swal("Gagal", response.message, "warning");
                            }
                        }
                    });
                }
            });
        });

        function validasiInput() {
            var input1 = $('#kode_provinsi').val();
            var input2 = $('#tahun_pajak').val();
            var input3 = $('#rekening_external').val();
            var input4 = $('nomor_polisi').val();

            if (input1 === '' || input2 === '' || input3 === '' || input4 === '') {
                // Menampilkan pesan validasi jika salah satu input kosong
                swal("Gagal", "Pemda, Tahun Pajak, Nomor Rekening, Nopol Wajib Diisi", "warning");
                return false;
            } else {
                return true;
            }
        }
    </script>
@endpush
