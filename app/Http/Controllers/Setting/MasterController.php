<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Models\MpMasterKotaKab;
use App\Http\Controllers\Controller;

class MasterController extends Controller
{
    public function getKota($id)
    {
        $kotaKab = MpMasterKotaKab::where('mp_mkk_kode_provinsi', $id)->get();
        return response()->json($kotaKab);
    }
}
