<?php

namespace App\services\BE;

use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ServiceBe
{
    public function cekNorek($noRek) {
        try {
            $path = '/validasi/rekening';
            $data = $this->getBodyRequestCekNorek($noRek);
            $res  = sendAPI($data, $path);

            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Cek Nomor Rekening Gagal, ".$e->getMessage(),
            ];
        }

        return response()->json($res);
    }

    public function cekValidasiNop($request) {
        try {
            $path = '/tpbb/validasi/nop';
            $data = $this->getBodyRequestCekNop($request);
            $res  = sendAPI($data, $path);

            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Cek NOP Gagal, ".$e->getMessage(),
            ];
        }
        return response()->json($res);
    }

    public function simulasiTpbb($request) {
        try {
            $path = '/tpbb/get-period-nominal';
            $data = $this->getBodyRequestSimulasi($request);
            $res  = sendAPI($data, $path);

            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Simulasi Gagal, ".$e->getMessage(),
            ];
        }
        return response()->json($res);
    }

    public function registrasiTpbb($request) {
        try {
            $path = '/tpbb/registrasi/pengajuan';
            $data = $this->getBodyRequestRegistrasi($request);
            Log::info('Api Request', [$data]);

            $res  = sendAPI($data, $path);

            Log::info('Api Response', [$res]);
            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Registrasi Gagal, ".$e->getMessage(),
            ];
        }
        return response()->json($res);
    }

    public function sendApproval($type, $noRef) {
        try {
            $path = '/tpbb/approval';
            $data = $this->getBodyRequestApproval($type, $noRef);
            Log::info('Api Request', [$data]);

            $res  = sendAPI($data, $path);

            Log::info('Api Response', [$res]);
            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Registrasi Gagal, ".$e->getMessage(),
            ];
        }
        return response()->json($res);
    }

    public function cekNopol($nopol, $type, $kdProv) {
        try {
            $path = '/tpkb/validasi/nopol';
            $data = $this->getBodyRequestNopol($nopol, $type, $kdProv);
            $res  = sendAPI($data, $path);

            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Cek Nomor Polisi Gagal, ".$e->getMessage(),
            ];
        }

        return response()->json($res);
    }

    public function simulasiTsamsat($request) {
        try {
            $path = '/tpkb/get/period-nominal';
            $data = $this->getBodyRequestSimulasiTsamsat($request);
            $res  = sendAPI($data, $path);

            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Simulasi Gagal, ".$e->getMessage(),
            ];
        }
        return response()->json($res);
    }

    public function registrasiTsamsat($request) {
        try {
            $path = '/tpkb/registrasi/pengajuan/backoffice';
            $data = $this->getBodyRequestRegistrasiTsamsat($request);
            $res  = sendAPI($data, $path);

            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Pengajuan Registrasi Gagal, ".$e->getMessage(),
            ];
        }
        return response()->json($res);
    }

    public function pembatalanTsamsat($nopol, $tahun) {
        try {
            $path = '/tpkb/pembatalan/pengajuan';
            $data = $this->getBodyRequestPembatalanTsamsat($nopol, $tahun);
            $res  = sendAPI($data, $path);

            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Pengajuan Pembatalan Gagal, ".$e->getMessage(),
            ];
        }
        return response()->json($res);
    }

    public function approvalRegTsamsat($mData) {
        try {
            $path = '/tpkb/registrasi/approval';
            $data = $this->getBodyRequestApprovalTsamsat($mData);
            $res  = sendAPI($data, $path);

            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Approval Registrasi Gagal, ".$e->getMessage(),
            ];
        }
        return response()->json($res);
    }

    public function approvalPembatalanTsamsat($mData) {
        try {
            $path = '/tpkb/pembatalan/approve';
            $data = $this->getBodyRequestApprovalTsamsat($mData);
            $res  = sendAPI($data, $path);

            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Approval Pembatalan Gagal, ".$e->getMessage(),
            ];
        }
        return response()->json($res);
    }

    public function approvalPembatalanAroTsamsat($mData) {
        try {
            $path = '/tpkb/update-aro';
            $data = $this->getBodyRequestApprovalTsamsat($mData);
            $res  = sendAPI($data, $path);

            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Approval Pembatalan ARO Gagal, ".$e->getMessage(),
            ];
        }
        return response()->json($res);
    }

    public function getBodyRequestCekNorek($noRek) {
        $data = [
            "accountNumber" => $noRek
        ];

        $res = [
            "channelCode" => "00",
            "requestTime" => date('Y-m-d H:m:s'),
            "data"        => $data
        ];

        return $res;
    }

    public function getBodyRequestCekNop($request) {
        $data = [
            "nop"           => $request['nop'],
            "branchCode"    => $request['branchCode'],
            "accountNumber" => $request['accountNumber'],
            "pemdaID"       => $request['pemdaID'],
            "userID"        => $request['userID'],
            "pemdaName"     => $request['pemdaName'],
            "tahunPajak"    => $request['tahunPajak']
        ];

        $res = [
            "channelCode" => "00",
            "requestTime" => date('Y-m-d H:m:s'),
            "data"        => $data
        ];

        return $res;
    }

    public function getBodyRequestSimulasi($request) {
        $tglRencanaBayar = Carbon::parse($request['tglRencanaBayar']);
        $tglAwalBlokir = Carbon::parse($request['tglAwalBlokir']);
        $tglAkhirBlokir = Carbon::parse($request['tglAkhirBlokir']);

        $data = [
            "totalBayar"        => preg_replace('/[^0-9]/', '', $request['totalBayar']),
            "settleDate"        => $request['settleDate'],
            "pemdaID"           => $request['pemdaID'],
            "tglAwalBlokir"     => $tglAwalBlokir->format('Y/m/d') ?? '',
            "tglRencanaBayar"   => $tglRencanaBayar->format('Y/m/d'),
            "tglAkhirBlokir"    => $tglAkhirBlokir->format('Y/m/d') ?? ''
        ];

        $res = [
            "channelCode" => "00",
            "requestTime" => date('Y-m-d H:m:s'),
            "data"        => $data
        ];

        return $res;
    }

    public function getBodyRequestRegistrasi($request) {
        $tglRencanaBayar = Carbon::parse($request['tglRencanaBayar']);
        $tglAwalBlokir = Carbon::parse($request['tglAwalBlokir']);
        $tglAkhirBlokir = Carbon::parse($request['tglAkhirBlokir']);

        $data = [
            "nop"                   => $request['nop'],
            "kabKotaPajak"          => $request['kabKotaPajak'],
            "provinsiPajak"         => $request['provinsiPajak'],
            "branchCode"            => $request['branchCode'],
            "accountNumber"         => $request['accountNumber'],
            "pemdaID"               => $request['pemdaID'],
            "userID"                => $request['userID'],
            "pemdaName"             => $request['pemdaName'],
            "tahunPajak"            => $request['tahunPajak'],
            "settleDate"            => $request['settleDate'],
            "tglAwalBlokir"         => $tglAwalBlokir->format('Y/m/d') ?? '',
            "tglRencanaBayar"       => $tglRencanaBayar->format('Y/m/d'),
            "tglAkhirBlokir"        => $tglAkhirBlokir->format('Y/m/d') ?? '',
            "customerState"         => $request['customerState'] ?? '',
            "statusNotifikasi"      => $request['statusNotifikasi'],
            "luasTanah"             => $request['luasTanah'],
            "dendaPajak"            => preg_replace('/[^0-9]/', '', $request['dendaPajak']),
            "customerProvince"      => $request['customerProvince'],
            "diskonPajak"           => preg_replace('/[^0-9]/', '', $request['diskonPajak']),
            "customerName"          => $request['customerName'],
            "kecamatanPajak"        => $request['kecamatanPajak'],
            "luasBangunan"          => $request['luasBangunan'],
            "nominalPajak"          => preg_replace('/[^0-9]/', '', $request['nominalPajak']),
            "totalBayar"            => preg_replace('/[^0-9]/', '', $request['totalBayar']),
            "biayaAdmin"            => preg_replace('/[^0-9]/', '', $request['biayaAdmin']),
            "lokasiPajak"           => $request['lokasiPajak'],
            "kelurahanPajak"        => $request['kelurahanPajak'] ?? '',
            "accountInternal"       => $request['accountInternal'],
            "phoneNumber"           => $request['phoneNumber'] ?? '',
            "accountName"           => $request['accountName'],
            "accountCurrency"       => $request['accountCurrency'],
            "accountCif"            => $request['accountCif'],
            "accountType"           => $request['accountType'],
            "jenisRegistrasi"       => $request['jenisRegistrasi'],
            "jumlahPeriod"          => (int) $request['jumlahPeriod'] ?? 0,
            "nominalSetoran"        => preg_replace('/[^0-9]/', '', $request['nominalSetoran']) ?? '',
            "email"                 => $request['email'] ?? '',
            "nik"                   => $request['nik'] ?? '',
        ];

        $res = [
            "channelCode" => "00",
            "requestTime" => date('Y-m-d H:m:s'),
            "data"        => $data
        ];

        return $res;
    }

    public function getBodyRequestApproval($type, $noRef) {
        $data = [
            "jenisApproval" => $type,
            "noReferensi"   => $noRef,
        ];

        $res = [
            "channelCode" => "00",
            "requestTime" => date('Y-m-d H:m:s'),
            "data"        => $data
        ];

        return $res;
    }

    public function getBodyRequestNopol($nopol, $type, $kdProv) {
        $data = [
            "nomorPolisi"       => $nopol,
            "jenisKendaraan"    => $type,
            "kodeProvinsi"      => $kdProv
        ];

        $res = [
            "channelCode" => "00",
            "requestTime" => date('Y-m-d H:m:s'),
            "data"        => $data
        ];

        return $res;
    }

    public function getBodyRequestSimulasiTsamsat($request) {
        $tglBlokir = date('dd', (int) $request['tglBlokir']);

        $data = [
            "tglBlokir"             => $tglBlokir,
            "tglAkhirPajakLama"     => $request['tglAkhirPajakLama'],
            "jumlah"                => preg_replace('/[^0-9]/', '', $request['jumlah']) ?? '',
        ];

        $res = [
            "channelCode" => "00",
            "requestTime" => date('Y-m-d H:m:s'),
            "data"        => $data
        ];

        return $res;
    }

    public function getBodyRequestRegistrasiTsamsat($request) {
        $tglBlokir = date('dd', (int) $request['tglBlokir']);

        $data = [
            "tglBlokir"         => $tglBlokir,
            "jenisRegistrasi"   => $request['jenisRegistrasi'] ?? '',
            "statusARO"         => $request['statusARO'] ?? '',
            "branchCode"        => Session::get('user')->kodeCabang,
            "accountInternal"   => $request['accountInternal'] ?? '',
            "phoneNumber"       => $request['phoneNumber'] ?? '',
            "accountName"       => $request['accountName'] ?? '',
            "accountType"       => $request['accountType'] ?? '',
            "nik"               => $request['nik'] ?? '',
            "accountCurrency"   => $request['accountCurrency'] ?? '',
            "accountNumber"     => $request['accountNumber'] ?? '',
            "accountCif"        => $request['accountCif'] ?? '',
            "email"             => $request['email'] ?? '',
            "keterangan"        => $request['keterangan'] ?? '',
            "pokokSWD"          => (int) preg_replace('/[^0-9]/', '', $request['pokokSWD']),
            "pokokPKB"          => (int) preg_replace('/[^0-9]/', '', $request['pokokPKB']),
            "alamatPemilik"     => $request['alamatPemilik'] ?? '',
            "namaMerekKB"       => $request['namaMerekKB'] ?? '',
            "tahunBuatan"       => $request['tahunBuatan'] ?? '',
            "namaModelKB"       => $request['namaModelKB'] ?? '',
            "jumlah"            => (int) preg_replace('/[^0-9]/', '', $request['jumlah']),
            "jenisKendaraan"    => $request['jenisKendaraan'] ?? '',
            "nomorPolisi"       => $request['nomorPolisi'] ?? '',
            "pokokBbn"          => (int) preg_replace('/[^0-9]/', '', $request['pokokBbn']),
            "namaPemilik"       => $request['namaPemilik'] ?? '',
            "tahunPajak"        => $request['tahunPajak'] ?? '',
            "pokokAdmSTNK"      => (int) preg_replace('/[^0-9]/', '', $request['pokokAdmSTNK']),
            "kodeWilayah"       => $request['kodeWilayah'] ?? '',
            "dendaBBN"          => (int) preg_replace('/[^0-9]/', '', $request['dendaBBN']),
            "nomorIdentitas"    => $request['nomorIdentitas'] ?? '',
            "pokokAdmTNKB"      => (int) preg_replace('/[^0-9]/', '', $request['pokokAdmTNKB']),
            "nomorRangka"       => $request['nomorRangka'] ?? '',
            "tglAkhirPajakLama" => $request['tglAkhirPajakLama'] ?? '',
            "kodeProvinsi"      => (int) preg_replace('/[^0-9]/', '', $request['kodeProvinsi']),
            "nomorMesin"        => $request['nomorMesin'] ?? '',
            "warnaPlat"         => $request['warnaPlat'] ?? '',
            "kodeBayar"         => $request['kodeBayar'] ?? '',
            "dendaPKB"          => (int) preg_replace('/[^0-9]/', '', $request['dendaPKB']),
            "nomorBPKB"         => $request['nomorBPKB'] ?? '',
            "warnaKB"           => $request['warnaKB'] ?? '',
            "kodeFlat"          => $request['kodeFlat'] ?? '',
            "dendaSWD"          => (int) preg_replace('/[^0-9]/', '', $request['dendaSWD']),
            "tglAkhirPajakBaru" => $request['tglAkhirPajakBaru'] ?? '',
            "milikKe"           => $request['milikKe'] ?? ''
        ];

        $res = [
            "channelCode"       => "00",
            "requestTime"       => date('Y-m-d H:m:s'),
            "branchReg"         => Session::get('user')->kodeCabang,
            "branchRegName"     => Session::get('user')->namaCabang,
            "userID"            => Session::get('user')->userId,
            "data"              => $data
        ];

        return $res;
    }

    public function getBodyRequestPembatalanTsamsat($nopol, $tahun) {
        $data = [
            "nomorPolisi"       => $nopol,
            "tahunPajak"        => $tahun,
        ];

        $res = [
            "channelCode" => "0000",
            "requestTime" => date('Y-m-d H:m:s'),
            "data"        => $data
        ];

        return $res;
    }

    public function getBodyRequestApprovalTsamsat($mData) {

        $res = [
            "channelCode" => "0000",
            "requestTime" => date('Y-m-d H:m:s'),
            "data"        => $mData
        ];

        return $res;
    }

	public function updateScheduler($request)
    {
        try {
            $path = '/scheduler/update-delete-job';
            $data = $this->updateSchedulerParameter($request);

            $res  = sendAPInov1($data, $path);

            $res = $res;
        } catch (Exception $e) {
            $res = [
                "responseCode" => "0068",
                "responseDesc" => "Cek NOP Gagal, " . $e->getMessage(),
            ];
        }
        return response()->json($res);
    }


    public function updateSchedulerParameter($request)
    {
        $data = [
            "status"           => $request['isactive'],
            "startTime"    => $request['_time'],
            "id" => $request['kode_scheduler'],
            "name"       => $request['nama_scheduler']
        ];

        return $data;
    }
}
