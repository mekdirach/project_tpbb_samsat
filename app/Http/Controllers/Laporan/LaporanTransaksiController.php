<?php

namespace App\Http\Controllers\Laporan;

use App\Jobs\ExportJob;
use App\Models\MpBranch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Views\VPbbDaftarPemda;
use Illuminate\Support\Facades\Session;
use App\Models\Views\VPbbLaporanTransaksi;
use Illuminate\Support\Facades\Route;

class LaporanTransaksiController extends Controller
{
    public function index_tran_sukses() {
        $pemda = VPbbDaftarPemda::all();
        $branch = MpBranch::all();
        return view('laporan.transaksi-sukses.index', compact('pemda', 'branch'));
    }

    public function list_tran_sukses(Request $request) {
        if(checkUserPusat()){
            $branchCode = $request->branch;
        }else{
            $branchCode = session('user')->kodeCabang;
        }

        $records      = VPbbLaporanTransaksi::where('mp_pbb_tp_rc', '0000')
        ->orderBy('mp_pbb_tp_tgl_pembayaran', 'asc');

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
            $records->where('mp_pbb_tp_tgl_pembayaran', '>=', "$request->start_date 00:00:00");
        }

        if($request->end_date){
            $records->where('mp_pbb_tp_tgl_pembayaran', '<=', "$request->end_date 23:59:59");
        }

        $resCount   = $records->count();
        $result    = $records->skip($request->start)->take($request->length)->get();
        $no         = $request->start;
		userActivities('Post', 'Melakukan List dan Pencarian Laporan Transaksi Sukses', 'v_pbb_laporan_transaksi', 'General', Route::current()->getName());

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
	
	public function detail_tran_sukses(Request $request)
    {
        $record      = VPbbLaporanTransaksi::where('pbb_c_nop', $request->id)->first();
        return response()->json($record);
    }

    public function index_tran_gagal() {
        $pemda = VPbbDaftarPemda::all();
        $branch = MpBranch::all();
		
        return view('laporan.transaksi-gagal.index', compact('pemda', 'branch'));
    }

    public function list_tran_gagal(Request $request) {
        if(checkUserPusat()){
            $branchCode = $request->branch;
        }else{
            $branchCode = session('user')->kodeCabang;
        }

        $records      = VPbbLaporanTransaksi::where('mp_pbb_tp_rc', '<>', '0000')
        ->orderBy('mp_pbb_tp_tgl_pembayaran', 'asc');

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
            $records->where('mp_pbb_tp_tgl_pembayaran', '>=', "$request->start_date 00:00:00");
        }

        if($request->end_date){
            $records->where('mp_pbb_tp_tgl_pembayaran', '<=', "$request->end_date 23:59:59");
        }

        $resCount   = $records->count();
        $result    = $records->skip($request->start)->take($request->length)->get();
        $no         = $request->start;
		userActivities('Post', 'Melakukan List dan Pencarian Laporan Transaksi Gagal', 'v_pbb_laporan_transaksi', 'General', Route::current()->getName());

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

    public function export_laporan_tran_sukses(Request $request) {
        $request->merge([
            "session_kode_cabang" => session('user')->kodeCabang,
        ]);

        if(checkUserPusat()){
            $branchCode = isset($request->mBranch) ? $request->mBranch : 0;
        }else{
            $branchCode = isset(session('user')->kodeCabang) ? Session::get('user')->kodeCabang : 0;
        }

        $records      = VPbbLaporanTransaksi::where('mp_pbb_tp_rc', '0000')
        ->orderBy('mp_pbb_tp_tgl_pembayaran', 'asc');

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
            $records->where('mp_pbb_tp_tgl_pembayaran', '>=', "$request->mStart 00:00:00");
        }

        if($request->mEnd){
            $records->where('mp_pbb_tp_tgl_pembayaran', '<=', "$request->mEnd 23:59:59");
        }

        $count   = $records->count();
        if ($count > 0) {
            $array = [
                'branch'    => Session::get('user')->kodeCabang,
                'count'     => $count,
                'type'      => 'transaksi-sukses',
                'request'   => $request->all()
            ];
            ExportJob::dispatch($array);
			userActivities('Post', 'Melakukan Export Laporan Transaksi Sukses', 'v_pbb_laporan_transaksi', 'General', Route::current()->getName());

            $message    = 'Berhasil melakukan export silahkan klik link <a href="'. route("download-manager") .'">ini</a>';
            $alert      = 'success';
        } else {
			userActivities('Post', 'Gagal Melakukan Export Laporan Transaksi Sukses', 'v_pbb_laporan_transaksi', 'General', Route::current()->getName());
            $message    = 'Gagal melakukan export, data tidak ditemukan';
            $alert      = 'danger';
        }

        $return = [
            'message'       => $message,
            'alert-type'    => $alert
        ];
        return back()->with($return);
    }

    public function export_laporan_tran_gagal(Request $request) {
        $request->merge([
            "session_kode_cabang" => session('user')->kodeCabang,
        ]);

        if(checkUserPusat()){
            $branchCode = isset($request->mBranch) ? $request->mBranch : 0;
        }else{
            $branchCode = isset(session('user')->kodeCabang) ? Session::get('user')->kodeCabang : 0;
        }

        $records      = VPbbLaporanTransaksi::where('mp_pbb_tp_rc', '<>', '0000')
        ->orderBy('mp_pbb_tp_tgl_pembayaran', 'asc');

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
            $records->where('mp_pbb_tp_tgl_pembayaran', '>=', "$request->mStart 00:00:00");
        }

        if($request->mEnd){
            $records->where('mp_pbb_tp_tgl_pembayaran', '<=', "$request->mEnd 23:59:59");
        }

        $count   = $records->count();
        if ($count > 0) {
            $array = [
                'branch'    => Session::get('user')->kodeCabang,
                'count'     => $count,
                'type'      => 'transaksi-gagal',
                'request'   => $request->all()
            ];
            ExportJob::dispatch($array);
			userActivities('Post', 'Melakukan Export Laporan Transaksi Gagal', 'v_pbb_laporan_transaksi', 'General', Route::current()->getName());

            $message    = 'Berhasil melakukan export silahkan klik link <a href="'. route("download-manager") .'">ini</a>';
            $alert      = 'success';
        } else {
			userActivities('Post', 'Gagal Melakukan Export Laporan Transaksi Gagal', 'v_pbb_laporan_transaksi', 'General', Route::current()->getName());

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
