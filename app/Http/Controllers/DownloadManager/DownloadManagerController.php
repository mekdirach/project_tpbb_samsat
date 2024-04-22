<?php

namespace App\Http\Controllers\DownloadManager;

use App\Models\MpBranch;
use Illuminate\Http\Request;
use App\Models\MpDownloadManager;
use App\Http\Controllers\Controller;
use App\Models\Views\VPbbDaftarPemda;
use Illuminate\Support\Facades\Route;


class DownloadManagerController extends Controller
{
    public function index() {
        $pemda = VPbbDaftarPemda::all();
        $branch = MpBranch::all();
        return view('download-manager.index', compact('pemda', 'branch'));
    }

    public function list(Request $request) {
        if(checkUserPusat()){
            $branchCode = $request->branch;
        }else{
            $branchCode = session('user')->kodeCabang;
        }

        $records      = MpDownloadManager::orderBy('id', 'desc');

        if ($branchCode && $branchCode != 'ALL') {
            $records->where('branch_code', $branchCode);
        }

        if ($request->tipe_laporan) {
            $records->where('document_type', $request->tipe_laporan);
        }

        $resCount   = $records->count();
        $result    = $records->skip($request->start)->take($request->length)->get();
        $no         = $request->start;
		userActivities('Post', 'Melakukan List download-manager', 'mp_download_manager', 'General', Route::current()->getName());

        foreach($result as $row){
            $row->id        = $row->pbb_c_nop;
            $row->rownum    = ++$no;
            $row->route     = route('download-manager.download', $row->path . $row->filename);
        }
        $response = [
            "draw"              => $request->draw,
            "recordsTotal"      => $resCount,
            "recordsFiltered"   => $resCount,
            "data"              => $result
        ];

        return response()->json($response);
    }

    public function download($params){
        if(file_exists(storage_path(str_replace('\\', '/', $params)))){
          $result = response()->download(storage_path(str_replace('\\', '/', $params)));
        }else{
          $result = redirect()->back()->with([
            'message'     => "Data tersebut belum selesai",
            'alert-type'  => "danger"
          ]);
        }
		userActivities('Post', 'Download download-manager', 'mp_download_manager', 'General', Route::current()->getName());
        return $result;
    }
}
