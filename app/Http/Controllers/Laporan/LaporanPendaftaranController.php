<?php

namespace App\Http\Controllers\Laporan;

use App\Models\MpBranch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\ExportJob;
use App\Models\Views\VPbbDaftarPemda;
use App\Models\Views\VPbbDaftarTabungan;
use App\Models\Views\VPbbLaporanPendaftaran;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;


class LaporanPendaftaranController extends Controller
{
    public function index() {
        $pemda = VPbbDaftarPemda::all();
        $branch = MpBranch::all();
        return view('laporan.pendaftaran.index', compact('pemda', 'branch'));
    }

    public function list(Request $request) {
        if(checkUserPusat()){
            $branchCode = $request->branch;
        }else{
            $branchCode = session('user')->kodeCabang;
        }

        $records      = VPbbLaporanPendaftaran::orderBy('pbb_c_reg_date', 'asc');

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

        if($request->start_date){
            $records->where('pbb_c_reg_date', '>=', "$request->start_date 00:00:00");
        }

        if($request->end_date){
            $records->where('pbb_c_reg_date', '<=', "$request->end_date 23:59:59");
        }

        $resCount   = $records->count();
        $result    = $records->skip($request->start)->take($request->length)->get();
        $no         = $request->start;
		userActivities('Post', 'Melakukan List dan Pencarian Laporan Pendaftaran', 'v_pbb_laporan_pendaftaran', 'General', Route::current()->getName());

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

    public function export(Request $request) {
        $request->merge([
            "session_kode_cabang" => session('user')->kodeCabang,
        ]);
        if(checkUserPusat()){
            $branchCode = isset($request->mBranch) ? $request->mBranch : 0;
        }else{
            $branchCode = isset(session('user')->kodeCabang) ? Session::get('user')->kodeCabang : 0;
        }

        $records      = VPbbLaporanPendaftaran::orderBy('pbb_c_reg_date', 'asc');

        if ($branchCode && $branchCode != 'ALL') {
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

        if($request->mStart){
            $records->where('pbb_c_reg_date', '>=', "$request->mStart 00:00:00");
        }

        if($request->mEnd){
            $records->where('pbb_c_reg_date', '<=', "$request->mEnd 23:59:59");
        }

        $count   = $records->count();
        if ($count > 0) {
            $array = [
                'branch'    => Session::get('user')->kodeCabang,
                'count'     => $count,
                'type'      => 'pendaftaran',
                'request'   => $request->all()
            ];
            ExportJob::dispatch($array);
			userActivities('Post', 'Melakukan export Laporan Pendaftaran', 'v_pbb_laporan_pendaftaran', 'General', Route::current()->getName());

            $message    = 'Berhasil melakukan export silahkan klik link <a href="'. route("download-manager") .'">ini</a>';
            $alert      = 'success';
        } else {
			userActivities('Post', 'Gagal Melakukan export Laporan Pendaftaran', 'v_pbb_laporan_pendaftaran', 'General', Route::current()->getName());
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
