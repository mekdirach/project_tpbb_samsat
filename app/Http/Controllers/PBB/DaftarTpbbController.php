<?php

namespace App\Http\Controllers\PBB;

use App\Jobs\ExportJob;
use App\Models\MpBranch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Views\VPbbDaftarPemda;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Models\Views\VPbbDaftarTabungan;
use App\Models\MpPbbTranAutoblokirBerkala;
use App\Models\MpPbbTranAutoblokirSekaligus;

class DaftarTpbbController extends Controller
{
    public function index() {
        $pemda = VPbbDaftarPemda::all();
        $branch = MpBranch::all();
        return view('pbb.daftar-tpbb.index', compact('pemda', 'branch'));
    }

    public function list(Request $request) {
        if(checkUserPusat()){
            $branchCode = $request->branch;
        }else{
            $branchCode = session('user')->kodeCabang;
        }
        
        $records      = VPbbDaftarTabungan::select('mp_mkk_nama', 'pbb_c_nop', 'pbb_c_nop_name', 'pbb_c_src_extacc', 'pbb_c_reg_type', 'pbb_c_amount')
        ->orderBy('mp_p_id', 'asc');

        if ($branchCode && $branchCode != 'ALL') {
            $records->where('pbb_c_created_office', $branchCode);
        }

        if($request->pemda){
            $records->where('mp_p_id', $request->pemda);
        }

        if($request->nop){
            $records->where('pbb_c_nop', $request->nop);
        }

        if($request->nama){
            $search = $request->nama;
            $records->where(function($records) use($search){
                $records->where('pbb_c_nop_name', 'ilike', "%$search%");
            });
        }

        if($request->norek){
            $records->where('pbb_c_src_extacc', $request->norek);
        }

        $resCount   = $records->count();
        $result    = $records->skip($request->start)->take($request->length)->get();
        $no         = $request->start;
		userActivities('Post', 'Melakukan List dan Pencarian Daftar Tabungan', 'v_pbb_daftar_tabungan', 'General', Route::current()->getName());

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

        return response()->json($response);
    }

    public function show($id) {
        $record = VPbbDaftarTabungan::where('pbb_c_nop', $id)->first();
        if ($record->pbb_c_reg_type == 'BERKALA') {
            $recordType = MpPbbTranAutoblokirBerkala::where('mp_pbb_ab_nop', $id)->get();
        } else {
            $recordType = MpPbbTranAutoblokirSekaligus::where('mp_pbb_as_nop', $id)->get();
        }
		userActivities('Detail', 'Melakukan Detail Daftar Tabungan', 'v_pbb_daftar_tabungan', 'General', Route::current()->getName());


        return view('pbb.daftar-tpbb.index', compact('record', 'recordType'));
    }

    public function export(Request $request) {
        $request->merge([
            "session_kode_cabang" => session('user')->kodeCabang,
        ]);

        if(checkUserPusat()){
            $branchCode = isset($request->mBranch) ? $request->mBranch : 0;
        }else{
            $branchCode = isset(session('user')->kodeCabang) ? Session::get('user')->kodeCabang : 0;
        }

        $records      = VPbbDaftarTabungan::orderBy('mp_p_id', 'asc');

        if($branchCode && $branchCode != 'ALL'){
            $records->where('pbb_c_created_office', $branchCode);
        }

        if($request->mPemda){
            $records->where('mp_p_id', $request->mPemda);
        }

        if($request->mNop){
            $records->where('pbb_c_nop', $request->mNop);
        }

        if($request->mNama){
            $search = $request->mNama;
            $records->where(function($records) use($search){
                $records->where('pbb_c_nop_name', 'ilike', "%$search%");
            });
        }

        if($request->mNorek){
            $records->where('pbb_c_src_extacc', $request->mNorek);
        }

        $count   = $records->count();
        if ($count > 0) {
            $array = [
                'branch'    => Session::get('user')->kodeCabang,
                'count'     => $count,
                'type'      => 'daftar-tpbb',
                'request'   => $request->all()
            ];
            ExportJob::dispatch($array);

            $message    = 'Berhasil melakukan export silahkan klik link <a href="'. route("download-manager") .'">ini</a>';
            $alert      = 'success';
        } else {
            $message    = 'Gagal melakukan export, data tidak ditemukan';
            $alert      = 'danger';
        }

        $return = [
            'message'       => $message,
            'alert-type'    => $alert
        ];
        return back()->with($return);
    }
}
