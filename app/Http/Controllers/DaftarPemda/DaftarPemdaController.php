<?php

namespace App\Http\Controllers\DaftarPemda;

use App\Models\SysRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\MpMasterProvinsi;
use App\Models\Views\VPbbDaftarPemda;
use Illuminate\Support\Facades\Route;


class DaftarPemdaController extends Controller
{
    public function index(){
        $provinsi = MpMasterProvinsi::all();
        $pemda = VPbbDaftarPemda::all();
        return view('daftar-pemda.index', compact('provinsi', 'pemda'));
    }

    public function list(Request $request) {
        $records      = VPbbDaftarPemda::orderBy('mp_p_id', 'asc');

        if($request->kota){
            $records->where('mp_mkk_kode', $request->kota);
        }

        if($request->pemda){
            $records->where('mp_p_id', $request->pemda);
        }

        $resCount   = $records->count();
        $result    = $records->skip($request->start)->take($request->length)->get();
        $no         = $request->start;

        foreach($result as $row){
            $row->id        =$row->pbb_c_nop;
            $row->rownum    = ++$no;
        }
        $response = [
            "draw"              => $request->draw,
            "recordsTotal"      => $resCount,
            "recordsFiltered"   => $resCount,
            "data"              => $result
        ];
		 userActivities('Post', 'Melakukan List dan Pencarian Daftar Pemda', 'v_pbb_daftar_pemda', 'General', Route::current()->getName());

        return response()->json($response);
    }
}
