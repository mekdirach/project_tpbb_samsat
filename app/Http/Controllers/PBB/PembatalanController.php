<?php

namespace App\Http\Controllers\PBB;

use Illuminate\Http\Request;
use App\services\BE\ServiceBe;
use App\Models\MpMasterKotaKab;
use App\Models\MpMasterProvinsi;
use App\Http\Controllers\Controller;
use App\Models\MpPbbCustomer;
use App\Models\Views\VPbbCekDataPenutupan;
use App\Models\Views\VPbbDaftarPemda;
use Exception;
use Illuminate\Support\Facades\Route;

class PembatalanController extends Controller
{
    public function index() {
        $pemda = VPbbDaftarPemda::all();
        return view('pbb.pembatalan.index', compact('pemda'));
    }

    public function detailPembatalan(Request $request) {
        $record = VPbbCekDataPenutupan::where('pbb_c_nop', $request->nop)
        ->where('pbb_c_tahun', $request->tahunPajak)
        ->where('pbb_c_pemda_id', $request->pemdaID)
        ->where('pbb_c_src_extacc', $request->accountNumber)
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

    public function updatePembatalan(Request $request) {
        try {
            $record = MpPbbCustomer::where('pbb_c_nop', $request->nop)
            ->where('pbb_c_tahun', $request->tahunPajak)
            ->where('pbb_c_pemda_id', $request->pemdaID)
            ->where('pbb_c_src_extacc', $request->accountNumber)
            ->update([
                'pbb_c_approval' => 2,
                'pbb_c_reject_note' => $request->notes
            ]);
			userActivities('update', 'Mengubah Pengajuan Pembatalan', 'v_pbb_cek_data_penutupan', 'General', Route::current()->getName());

            $rc = '0000';
            $message = 'Berhasil mengajukan pembatalan';
            $data = [];
        } catch (Exception $e) {
            $rc = '0066';
            $message = 'Gagal mengajukan pembatalan, '.$e->getMessage();
            $data = [];
			userActivities('update', 'Gagal Pengajuan Pembatalan', 'v_pbb_cek_data_penutupan', 'General', Route::current()->getName());
        }

        $res = [
            'rc'        => $rc,
            'message'   => $message,
            'data'      => $data,
        ];
		

        return response()->json($res);
    }
}
