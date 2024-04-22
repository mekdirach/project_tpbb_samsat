<?php

namespace App\Http\Controllers\TSamsat\Laporan;

use App\Jobs\ExportJob;
use App\Models\MpBranch;
use Illuminate\Http\Request;
use App\Models\MpMasterProvinsi;
use App\Http\Controllers\Controller;
use App\Jobs\ExportTsamsat;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Models\Views\VPbbLaporanPendaftaran;
use App\Models\Views\VSamsatLaporanPendaftaran;

class LaporanRegistrasiController extends Controller
{
    public function index() {
        $pemda = MpMasterProvinsi::all();
        $branch = MpBranch::all();
        return view('t-samsat.laporan.registrasi.index', compact('pemda', 'branch'));
    }

    public function list(Request $request) {
        if(checkUserPusat()){
            $branchCode = $request->branch;
        }else{
            $branchCode = session('user')->kodeCabang;
        }

        $records      = VSamsatLaporanPendaftaran::orderBy('registrasi_tgl', 'asc');

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

        if($request->start_date){
            $records->where('registrasi_tgl', '>=', "$request->start_date 00:00:00");
        }

        if($request->end_date){
            $records->where('registrasi_tgl', '<=', "$request->end_date 23:59:59");
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

        $records      = VSamsatLaporanPendaftaran::orderBy('registrasi_tgl', 'asc');

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

        if($request->mStart){
            $records->where('registrasi_tgl', '>=', "$request->mStart 00:00:00");
        }

        if($request->mEnd){
            $records->where('registrasi_tgl', '<=', "$request->mEnd 23:59:59");
        }

        $count   = $records->count();
        if ($count > 0) {
            $array = [
                'branch'    => Session::get('user')->kodeCabang,
                'count'     => $count,
                'type'      => 'registrasi',
                'request'   => $request->all()
            ];
            ExportTsamsat::dispatch($array);
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
