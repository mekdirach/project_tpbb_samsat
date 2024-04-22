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
                        <label class="col-form-label col-sm-4">Provinsi</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="provinsi" id="provinsi">
                                <option selected value="">- Pilih -</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{ $item->mp_mp_kode }}">{{ $item->mp_mp_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Pemda</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="pemda" id="pemda">
                                <option selected value="">- Pilih -</option>
                                @foreach ($pemda as $item)
                                    <option value="{{ $item->mp_p_id }}">{{ $item->mp_p_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <label class="col-form-label col-sm-6">Kota/Kabupaten</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="kota" id="kota">
                                <option selected value="">- Pilih -</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6"></div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-sm btn-primary" id="btnSearch"><i class="ion ion-ios-search"></i> Cari</button>
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
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datatables-demos thead').addClass('thead-light');
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
                $("#provinsi").val('')
                $('#kota').val('')
                $('#pemda').val('')
                $('.datatables-demos').DataTable().clear().destroy()
                loadData()
            })

            $('#provinsi').on('change', function() {
                var kdProvinsi = $(this).val();
                if (kdProvinsi) {
                    $.ajax({
                        url: '/setting/kota-kab/' + kdProvinsi,
                        type: 'GET',
                        success: function(data) {
                            $('#kota').empty();

                            if (data.length > 0) {
                                $('#kota').append('<option value="">'+ '- Pilih -' + '</option>');

                                $.each(data, function(key, value) {
                                    $('#kota').append('<option value="' + value.mp_mkk_kode + '">'+ value.mp_mkk_nama + '</option>');
                                });
                            } else {
                                $('#kota').append('<option value="">Data tidak tersedia</option>');
                            }
                        }
                    });
                } else {
                    $('#kota').empty();
                    $('#kota').append('<option value="">Pilih Kota</option>');
                }
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
                    url: "{{ route('daftar-pemda.list') }}",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        kota: $('#kota').val(),
                        pemda: $('#pemda').val(),
                    }
                },
                columns: [{
                        title: "No",
                        width: "5%",
                        data: 'rownum',
                        mRender: function(data, type, row) {
                            return row.rownum;
                        }
                    },
                    {
                        title: "Kode Pemda",
                        width: "5%",
                        data: 'mp_p_id',
                    },
                    {
                        title: "Nama Pemda",
                        width: "5%",
                        data: 'mp_p_nama',
                    },
                    {
                        title: "Kota/Kab",
                        width: "5%",
                        data: 'mp_mkk_nama',
                    },
                    {
                        title: "Status",
                        data: 'mp_p_status',
                        width: "5%",
                        mRender: function(data, type, row) {
                            let html = "";
                            if (row.mp_p_status === '1')
                                html =
                                `<span class="badge badge-success status-span">Aktif<i class="fa fa-check"></i></span>`;
                            else
                                html =
                                `<span class="badge badge-danger status-span">Nonaktif<i class="fa fa-clock"></i></span>`;

                            return html
                        }
                    },
                ]
            });
        }
    </script>
@endpush
