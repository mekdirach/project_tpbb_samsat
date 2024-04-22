<?php

namespace App\Http\Controllers\TSamsat\BjbSamsat;

use Illuminate\Http\Request;
use App\services\BE\ServiceBe;
use App\Models\MpMasterProvinsi;
use App\Http\Controllers\Controller;

class RegistrasiSamsatController extends Controller
{
    public function index() {
        $pemda = MpMasterProvinsi::all();
        return view('t-samsat.bjb-tsamsat.registrasi.index', compact('pemda'));
    }

    public function cekNopol(Request $request, ServiceBe $servisBe) {
        return $servisBe->cekNopol($request->nopol, $request->jenisKendaraan, $request->pemdaID);
    }

    public function simulasiTsamsat(Request $request, ServiceBe $servisBe) {
        return $servisBe->simulasiTsamsat($request);
    }

    public function registrasiTsamsat(Request $request, ServiceBe $servisBe) {
        return $servisBe->registrasiTsamsat($request);
    }
}
