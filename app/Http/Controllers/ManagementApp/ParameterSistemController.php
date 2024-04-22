<?php

namespace App\Http\Controllers\ManagementApp;

use App\Http\Controllers\Controller;
use App\Models\SysRole;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ParameterSistemController extends Controller
{

    public function index()
    {
        return view('management-app.parameter-sistem.index');
    }

    public function list()
    {
        $record = DB::table('mp_pbb_parameter')->get();

        return response()->json($record);
    }

    public function edit(Request $request)
    {
		userActivities('Update', 'Mengubah Parameter System', 'mp_pbb_parameter', 'General', Route::current()->getName());

        $record = [
            'pbb_p_name' => $request->pbb_p_name,
            'pbb_p_min_period_autodebet' => $request->period_autodebet,
            'pbb_p_default_cutoff_pembayaran' => $request->default_cutoff_pembayaran,
            'pbb_p_period_sms_konfirmasi' => $request->period_sms_konfirmasi,
            'pbb_p_hold_code' => $request->hold_code,
            'pbb_p_sms_broadcast_tps' => $request->brond_tps,
            'pbb_p_sms_content_saldo_kurang' => $request->saldo_kurang,
            'pbb_p_sms_content_pembayaran_berhasil' => $request->pembayaran_berhasil,
            'pbb_p_sms_content_pembayaran_gagal' => $request->pembayaran_gagal,
            'pbb_p_sms_content_konfirmasi_pembayaran' => $request->konf_pembayaran,
            'pbb_p_updated_by' => Session('user')->nama,
            'pbb_p_updated_at' => Carbon::now('Asia/Jakarta')

        ];
        $affectedRows = DB::table('mp_pbb_parameter')->where('pbb_p_id', $request->pbb_p_id)->update($record);

        if ($affectedRows > 0) {
            $message = "Berhasil mengubah data!";
            $rc = "0000";
        } else {
            $message = "Gagal mengubah data! Rekord tidak ditemukan.";
            $rc = "0066";
        }

        $result = [
            "rc"        => $rc,
            "message"   => $message
        ];

        return response()->json($result);
    }
}
