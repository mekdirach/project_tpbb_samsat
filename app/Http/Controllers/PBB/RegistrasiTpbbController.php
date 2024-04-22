<?php

namespace App\Http\Controllers\PBB;

use Illuminate\Http\Request;
use App\services\BE\ServiceBe;
use App\Http\Controllers\Controller;
use App\Models\Views\VPbbDaftarPemda;
use Illuminate\Support\Facades\Route;

class RegistrasiTpbbController extends Controller
{
    public function index() {
        $pemda = VPbbDaftarPemda::all();
		userActivities('list', 'registrasi-tpbb', 'v_pbb_daftar_pemda', 'General', Route::current()->getName());
        return view('pbb.registrasi-tpbb.index', compact('pemda'));
    }

    public function cekNorek(Request $request, ServiceBe $servisBe) {
        return $servisBe->cekNorek($request->norek);
    }

    public function cekNop(Request $request, ServiceBe $servisBe) {
        $request->merge([
            "userID" => session('user')->userId,
            "branchCode" => session('user')->kodeCabang,
        ]);
		userActivities('Post', 'Cek NOP', 'ServiceBe Validasi TPBB', 'General', Route::current()->getName());
        return $servisBe->cekValidasiNop($request);
    }

    public function simulasiTpbb(Request $request, ServiceBe $servisBe) {
		userActivities('Post', 'simulasi Tpbb', 'ServiceBe Simulasi TPBB', 'General', Route::current()->getName());
        return $servisBe->simulasiTpbb($request);
    }

    public function registrasiTpbb(Request $request, ServiceBe $servisBe) {
        $request->merge([
            "userID" => session('user')->userId,
            "branchCode" => session('user')->kodeCabang,
            "accountCurrency" => "IDR",
        ]);
		userActivities('Post', 'registrasi tpbb', 'ServiceBe registrasi-tpbb', 'General', Route::current()->getName());
        return $servisBe->registrasiTpbb($request);
    }
}
