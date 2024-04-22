$(function() {
  $('.smartwizard-example').smartWizard({
    autoAdjustHeight: false,
    backButtonSupport: false,
    useURLhash: false,
    showStepURLhash: false
  });

  // Change markup for vertical wizards
  //

  $('#smartwizard-4 .sw-toolbar').appendTo($('#smartwizard-4 .sw-container'));
  $('#smartwizard-5 .sw-toolbar').appendTo($('#smartwizard-5 .sw-container'));
});

// With validation
$(function() {
  var $form = $('#smartwizard-6');
  var $btnFinish = $('<button class="btn-finish btn btn-primary mr-2" disabled type="button">Finish</button>');

  // Set up validator
  $form.validate({
    errorPlacement: function errorPlacement(error, element) {
      $(element).parents('.form-group').append(
        error.addClass('invalid-feedback small d-block')
      )
    },
    highlight: function(element) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function(element) {
      $(element).removeClass('is-invalid');
    },
    rules: {
      'wizard-confirm': {
        equalTo: 'input[name="wizard-password"]'
      }
    }
  });

  // PBB Registrasi TPBB
  $form
    .smartWizard({
      autoAdjustHeight: false,
      backButtonSupport: false,
      useURLhash: false,
      showStepURLhash: false,
      toolbarSettings: {
        toolbarExtraButtons: [$btnFinish]
      }
    })
    .on('leaveStep', function(e, anchorObject, stepNumber, stepDirection) {
      // stepDirection === 'forward' :- this condition allows to do the form validation
      // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
      if (stepDirection === 'forward'){ return $form.valid(); }
      return true;
    })
    .on('showStep', function(e, anchorObject, stepNumber, stepDirection, stepP) {
      var $btn = $form.find('.btn-finish');

      // Enable finish button only on last step
    //   if (stepNumber === 3) {
    //     $btn.removeClass('hidden');
    //   } else {
    //     $btn.addClass('hidden');
    //   }
        if($('button.sw-btn-next').hasClass('disabled')){
            $btn.removeAttr('disabled')
        }else{
            $btn.attr('disabled', true)
        }
    });

  // Click on finish button
  $form.find('.btn-finish').on('click', function(){
    if (!$form.valid()){ return; }
    let accountNumber = $('#norek').val()
    let nop = $('#nop').val()
    let pemdaID = $('#pemda').val()
    let pemdaName = $('#pemda').find('option:selected').text();
    let tahunPajak = $('#tahun_pajak').val()
    let jenisRegistrasi = $('#type_reg').val()
    let settleDate = $('#settleDate').val()
    let tglAwalBlokir = $('#b-m-dtp-date_awal_blokir').val()
    let tglRencanaBayar = $('#b-m-dtp-date_bayar').val()
    let tglAkhirBlokir = $('#b-m-dtp-date_akhir_blokir').val()
    let customerState = ""
    let statusNotifikasi = $('#type_notif').val()
    let luasTanah = $('#luas_tanah').val()
    let dendaPajak = $('#denda').val()
    let customerProvince = $('#customerProvince').val()
    let diskonPajak = $('#potongan').val()
    let customerName = $('#nama_wajib_pajak').val()
    let kecamatanPajak = $('#kecamatan').val()
    let luasBangunan = $('#luas_bangunan').val()
    let nominalPajak = $('#nominal_pembayaran').val()
    let totalBayar = $('#total').val()
    let biayaAdmin = $('#fee').val()
    let lokasiPajak = $('#letak_objek_pajak').val()
    let kelurahanPajak = $('#kel').val()
    let accountInternal = $('#internal_acc').val()
    let phoneNumber = $('#phone').val()
    let accountName = $('#nama_nasabah').val()
    let accountType = $('#tipe_acc').val()
    let accountCif = $('#cif').val()
    let jumlahPeriod = $('#periode').val()
    let nominalSetoran = $('#angsuran_berkala').val()
    let email = $('#alamat_email').val()
    let provinsiPajak = $('#provinsiPajak').val()
    let kabKotaPajak = $('#kabKotaPajak').val()
    let nik = $('#nik').val()

    // Submit form
    $.ajax({
        type: "POST",
        url: "/pbb/registrasi-tpbb/registrasi",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            accountNumber : accountNumber,
            nop : nop,
            pemdaID : pemdaID,
            pemdaName : pemdaName,
            tahunPajak : tahunPajak,
            jenisRegistrasi : jenisRegistrasi,
            settleDate : settleDate,
            tglAwalBlokir : tglAwalBlokir,
            tglRencanaBayar : tglRencanaBayar,
            tglAkhirBlokir : tglAkhirBlokir,
            customerState : customerState,
            statusNotifikasi : statusNotifikasi,
            luasTanah : luasTanah,
            dendaPajak : dendaPajak,
            customerProvince : customerProvince,
            diskonPajak : diskonPajak,
            customerName : customerName,
            kecamatanPajak : kecamatanPajak,
            luasBangunan : luasBangunan,
            nominalPajak : nominalPajak,
            totalBayar : totalBayar,
            biayaAdmin : biayaAdmin,
            lokasiPajak :lokasiPajak,
            kelurahanPajak : kelurahanPajak,
            accountInternal : accountInternal,
            phoneNumber : phoneNumber,
            accountName : accountName,
            accountType : accountType,
            accountCif : accountCif,
            jumlahPeriod : jumlahPeriod,
            nominalSetoran : nominalSetoran,
            email : email,
            provinsiPajak : provinsiPajak,
            kabKotaPajak : kabKotaPajak,
            nik : nik
        },
        success: function (response) {
            if (response.responseCode === '0000') {
                swal("Pengajuan Registrasi Berhasil", response.responseDesc, "success");
                window.location.href=$('#link').val()
            } else {
                swal("Gagal", response.responseDesc, "warning");
            }
        }
    });
    return false;
  });
});

//Samsat Registrasi
$(function() {
    var $form = $('#smartwizard-7');
    var $btnFinish = $('<button class="btn-finish btn btn-primary mr-2" disabled type="button">Finish</button>');

    // Set up validator
    $form.validate({
      errorPlacement: function errorPlacement(error, element) {
        $(element).parents('.form-group').append(
          error.addClass('invalid-feedback small d-block')
        )
      },
      highlight: function(element) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element) {
        $(element).removeClass('is-invalid');
      },
      rules: {
        'wizard-confirm': {
          equalTo: 'input[name="wizard-password"]'
        }
      }
    });

    // Initialize wizard
    $form
      .smartWizard({
        autoAdjustHeight: false,
        backButtonSupport: false,
        useURLhash: false,
        showStepURLhash: false,
        toolbarSettings: {
          toolbarExtraButtons: [$btnFinish]
        }
      })
      .on('leaveStep', function(e, anchorObject, stepNumber, stepDirection) {
        // stepDirection === 'forward' :- this condition allows to do the form validation
        // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
        if (stepDirection === 'forward'){ return $form.valid(); }
        return true;
      })
      .on('showStep', function(e, anchorObject, stepNumber, stepDirection, stepP) {
        var $btn = $form.find('.btn-finish');

        // Enable finish button only on last step
      //   if (stepNumber === 3) {
      //     $btn.removeClass('hidden');
      //   } else {
      //     $btn.addClass('hidden');
      //   }
          if($('button.sw-btn-next').hasClass('disabled')){
              $btn.removeAttr('disabled')
          }else{
              $btn.attr('disabled', true)
          }
      });

    // Click on finish button
    $form.find('.btn-finish').on('click', function(){
    var $btn = $form.find('.btn-finish');
      if (!$form.valid()){ return; }
        let tglBlokir         = $('#tgl-blokir').val()
        let jenisRegistrasi   = $('#type_reg').val()
        let statusARO         = $('#status-aro').val()
        // let branchCode        = $('#norek').val()
        let accountInternal   = $('#acc-internal').val()
        let phoneNumber       = $('#no_hp').val()
        let accountName       = $('#nama_nasabah').val()
        let accountType       = $('#tipe_acc').val()
        let nik               = $('#nik').val()
        let accountCurrency   = $('#currency').val()
        let accountNumber     = $('#no_rekening').val()
        let accountCif        = $('#cif').val()
        let email             = $('#email').val()
        let keterangan        = $('#informasi').val()
        let pokokSWD          = $('#nominal-swd').val()
        let pokokPKB          = $('#nominal-pkb').val()
        let alamatPemilik     = $('#alamat').val()
        let namaMerekKB       = $('#merek-kendaraan').val()
        let tahunBuatan       = $('#tahun-produksi').val()
        let namaModelKB       = $('#model-kendaraan').val()
        let jumlah            = $('#jumlah-bayar').val()
        let jenisKendaraan    = $('#jenis_kendaraan').val()
        let nomorPolisi       = $('#no_polisi').val()
        let pokokBbn          = $('#nominal-bbn').val()
        let namaPemilik       = $('#owner').val()
        let tahunPajak        = $('#masa-stnk').val()
        let pokokAdmSTNK      = $('#biaya-admin').val()
        let kodeWilayah       = $('#kode-wilayah').val()
        let dendaBBN          = $('#denda-bbn').val()
        let nomorIdentitas    = $('#nomor-id').val()
        let pokokAdmTNKB      = $('#nominal-tnkb').val()
        let nomorRangka       = $('#no-rangka').val()
        let tglAkhirPajakLama = $('#tgl_akhir_pajak_lama').val()
        let kodeProvinsi      = $('#provinsi').val()
        let nomorMesin        = $('#no-mesin').val()
        let warnaPlat         = $('#warna-plat').val()
        let kodeBayar         = $('#kode-bayar').val()
        let dendaPKB          = $('#denda-pkb').val()
        let nomorBPKB         = $('#nomor-bpkb').val()
        let warnaKB           = $('#warna').val()
        let kodeFlat          = $('#kode-flat').val()
        let dendaSWD          = $('#denda-swd').val()
        let tglAkhirPajakBaru = $('#tgl-pajak').val()
        let milikKe           = $('#kepemilikan').val()

        $btn.attr('disabled', true)
      // Submit form
      $.ajax({
          type: "POST",
          url: "/bjb-t-samsat/registrasi-samsat",
          data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                tglBlokir         : tglBlokir,
                jenisRegistrasi   : jenisRegistrasi,
                statusARO         : statusARO,
                accountInternal   : accountInternal,
                phoneNumber       : phoneNumber,
                accountName       : accountName,
                accountType       : accountType,
                nik               : nik,
                accountCurrency   : accountCurrency,
                accountNumber     : accountNumber,
                accountCif        : accountCif,
                email             : email,
                keterangan        : keterangan,
                pokokSWD          : pokokSWD,
                pokokPKB          : pokokPKB,
                alamatPemilik     : alamatPemilik,
                namaMerekKB       : namaMerekKB,
                tahunBuatan       : tahunBuatan,
                namaModelKB       : namaModelKB,
                jumlah            : jumlah,
                jenisKendaraan    : jenisKendaraan,
                nomorPolisi       : nomorPolisi,
                pokokBbn          : pokokBbn,
                namaPemilik       : namaPemilik,
                tahunPajak        : tahunPajak,
                pokokAdmSTNK      : pokokAdmSTNK,
                kodeWilayah       : kodeWilayah,
                dendaBBN          : dendaBBN,
                nomorIdentitas    : nomorIdentitas,
                pokokAdmTNKB      : pokokAdmTNKB,
                nomorRangka       : nomorRangka,
                tglAkhirPajakLama : tglAkhirPajakLama,
                kodeProvinsi      : kodeProvinsi,
                nomorMesin        : nomorMesin,
                warnaPlat         : warnaPlat,
                kodeBayar         : kodeBayar,
                dendaPKB          : dendaPKB,
                nomorBPKB         : nomorBPKB,
                warnaKB           : warnaKB,
                kodeFlat          : kodeFlat,
                dendaSWD          : dendaSWD,
                tglAkhirPajakBaru : tglAkhirPajakBaru,
                milikKe           : milikKe
          },
          success: function (response) {
              if (response.responseCode === '0000') {
                  swal("Pengajuan Registrasi Berhasil", response.responseDesc, "success");
                  window.location.href=$('#link').val()
              } else {
                  swal("Gagal", response.responseDesc, "warning");
                  $btn.attr('disabled', false)
              }
          }
      });
      return false;
    });
  });
