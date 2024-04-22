<div class="card">
    <div class="card-body">
        <form id="form-content">
            @csrf
            <input type="hidden" name="pbb_p_id" id="pbb_p_id">
            <div class="form-group row">
                <label class="col-form-label col-sm-4 text-sm-left">Name</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="pbb_p_name" name="pbb_p_name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 text-sm-left">Minimal Periode Berkala</label>
                <div class="col-sm-1">
                    <input type="number" class="form-control" id="period_autodebet" name="period_autodebet">
                </div>
                <div class="col-sm-1">
                    <span class="group-text">Bulan</span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-4 text-sm-left">Periode Batas Akhir Pembayaran</label>
                <div class="col-sm-1">
                    <input type="number" class="form-control" id="default_cutoff_pembayaran"
                        name="default_cutoff_pembayaran">
                </div>
                <div class="col-sm-1">
                    <span class="group-text">Hari</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 text-sm-left">Periode SMS Konfirmasi</label>
                <div class="col-sm-1">
                    <input type="number" class="form-control" id="period_sms_konfirmasi" name="period_sms_konfirmasi">
                </div>
                <div class="col-sm-1">
                    <span class="group-text">Hari</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 text-sm-left">Hold Code</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="hold_code" name="hold_code">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 text-sm-left">SMS Broadcast TPS</label>
                <div class="col-sm-1">
                    <input type="number" class="form-control" id="brond_tps" name="brond_tps">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 text-sm-left">SMS Saldo Kurang</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="saldo_kurang" name="saldo_kurang">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 text-sm-left">SMS Pembayaran Berhasil</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="pembayaran_berhasil" name="pembayaran_berhasil">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 text-sm-left">SMS Pembayaran Gagal</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="pembayaran_gagal" name="pembayaran_gagal">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 text-sm-left">SMS Konfirmasi Pembayaran</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="konf_pembayaran" name="konf_pembayaran">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-5 ml-sm-auto">
                    <button type="submit" class="btn btn-primary" id="saveParam">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    /* CSS */
    .group-text {
        display: flex;
        align-items: center;
        padding: .375rem .75rem;
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
    }
</style>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            loadData();
            $('#saveParam').click(function() {
                event.preventDefault();
                var formData = $('#form-content').serialize();
                var url = "{{ route('management-app.parameter-sistem.edit') }}";
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
            });

        });

        function loadData() {
            $.ajax({
                url: "{{ route('management-app.parameter-sistem.list') }}",
                type: "GET",
                success: function(response) {
                    var data = response[0];
                    $('#pbb_p_id').val(data.pbb_p_id);
                    $('#pbb_p_name').val(data.pbb_p_name);
                    $('#period_autodebet').val(data.pbb_p_min_period_autodebet);
                    $('#default_cutoff_pembayaran').val(data.pbb_p_default_cutoff_pembayaran);
                    $('#period_sms_konfirmasi').val(data.pbb_p_period_sms_konfirmasi);
                    $('#hold_code').val(data.pbb_p_hold_code);
                    $('#brond_tps').val(data.pbb_p_sms_broadcast_tps);
                    $('#saldo_kurang').val(data.pbb_p_sms_content_saldo_kurang);
                    $('#pembayaran_berhasil').val(data.pbb_p_sms_content_pembayaran_berhasil);
                    $('#pembayaran_gagal').val(data.pbb_p_sms_content_pembayaran_gagal);
                    $('#konf_pembayaran').val(data.pbb_p_sms_content_konfirmasi_pembayaran);

                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika ada
                    console.error(error);
                }
            });
        }
    </script>
@endpush
