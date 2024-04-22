<?php

namespace App\Http\Controllers\TSamsat\BjbSamsat;

use App\Models\MpBranch;
use Illuminate\Http\Request;
use App\Models\MpMasterProvinsi;
use App\Http\Controllers\Controller;
use App\Jobs\ExportTsamsat;
use App\Models\Views\VPbbDaftarPemda;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Models\Views\VPbbDaftarTabungan;
use App\Models\MpPbbTranAutoblokirBerkala;
use App\Models\Views\VSamsatDaftarTabungan;
use App\Models\MpPbbTranAutoblokirSekaligus;

class ListTabunganController extends Controller
{
    public function index() {
        $pemda = MpMasterProvinsi::all();
        $branch = MpBranch::all();
        return view('t-samsat.bjb-tsamsat.list-tabungan.index', compact('pemda', 'branch'));
    }

    public function list(Request $request) {
        if(checkUserPusat()){
            $branchCode = $request->branch;
        }else{
            $branchCode = session('user')->kodeCabang;
        }

        $records      = VSamsatDaftarTabungan::orderBy('registrasi_tgl', 'asc');

        if ($branchCode && $branchCode != 'ALL') {
            $records->where('created_office', $branchCode);
        }

        if($request->pemda){
            $records->where('mp_mp_kode', $request->pemda);
        }

        if($request->nomor_polisi){
            $records->where('nomor_polisi', $request->nomor_polisi);
        }

        if($request->nama){
            $search = $request->nama;
            $records->where(function($records) use($search){
                $records->where('nm_pemilik', 'ilike', "%$search%");
            });
        }

        if($request->norek){
            $records->where('rekening_external', $request->norek);
        }

        $resCount   = $records->count();
        $result    = $records->skip($request->start)->take($request->length)->get();
        $no         = $request->start;
		userActivities('Post', 'Melakukan List dan Pencarian Daftar Tabungan', 'v_pbb_daftar_tabungan', 'General', Route::current()->getName());

        foreach($result as $row){
            $row->id        =$row->id;
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
        $record = VSamsatDaftarTabungan::where('nomor_polisi', $id)->first();
        // if ($record->pbb_c_reg_type == 'BERKALA') {
        //     $recordType = MpPbbTranAutoblokirBerkala::where('mp_pbb_ab_nop', $id)->get();
        // } else {
        //     $recordType = MpPbbTranAutoblokirSekaligus::where('mp_pbb_as_nop', $id)->get();
        // }
		userActivities('Detail', 'Melakukan Detail Daftar Tabungan', 'v_pbb_daftar_tabungan', 'General', Route::current()->getName());


        return view('t-samsat.bjb-tsamsat.list-tabungan.index', compact('record'));
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

        $records      = VSamsatDaftarTabungan::orderBy('registrasi_tgl', 'asc');

        if ($branchCode && $branchCode != 'ALL') {
            $records->where('created_office', $branchCode);
        }

        if($request->mPemda){
            $records->where('mp_mp_kode', $request->mPemda);
        }

        if($request->mNopol){
            $records->where('nomor_polisi', $request->mNopol);
        }

        if($request->mNama){
            $search = $request->mNama;
            $records->where(function($records) use($search){
                $records->where('nm_pemilik', 'ilike', "%$search%");
            });
        }

        if($request->mNorek){
            $records->where('rekening_external', $request->mNorek);
        }

        $count   = $records->count();
        if ($count > 0) {
            $array = [
                'branch'    => Session::get('user')->kodeCabang,
                'count'     => $count,
                'type'      => 'daftar-tsamsat',
                'request'   => $request->all()
            ];
            ExportTsamsat::dispatch($array);

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
