<?php

namespace App\Http\Controllers\TSamsat\BjbSamsat;

use Illuminate\Http\Request;
use App\Models\MpMasterProvinsi;
use App\Http\Controllers\Controller;
use App\Models\MpCustomer;
use Illuminate\Support\Facades\Route;
use App\Models\Views\VSamsatDaftarTabungan;
use App\services\BE\ServiceBe;

class PembatalanController extends Controller
{
    public function index() {
        $pemda = MpMasterProvinsi::all();
        return view('t-samsat.bjb-tsamsat.pembatalan.index', compact('pemda'));
    }

    public function detailPembatalan(Request $request) {
        $record = MpCustomer::where('jenis_kendaraan', $request->jenis_kendaraan)
        ->where('nomor_polisi', $request->nopol)
        ->where('tahun_pajak', $request->tahun_pajak)
        ->get();

        $rCount = $record->count();
        if ($rCount > 0) {
            $rc = '0000';
            $message = 'Data Ditemukan';
        } else {
            $rc = '0066';
            $message = 'Data Tidak Ditemukan';
        }

        $res = [
            'rc'        => $rc,
            'message'   => $message,
            'data'      => $record,
        ];
		userActivities('Detail', 'Melakukan Detail Pembatalan', 'v_pbb_cek_data_penutupan', 'General', Route::current()->getName());

        return response()->json($res);
    }

    public function updatePembatalan(Request $request, ServiceBe $serviceBe) {
        return $serviceBe->pembatalanTsamsat($request->nopol, $request->tahunPajak);
    }
}
