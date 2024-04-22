<?php

namespace App\Http\Controllers\Approval;

use Exception;
use App\Models\SysRole;
use App\Models\MpBranch;
use Illuminate\Http\Request;
use App\Models\MpPbbCustomer;
use App\services\BE\ServiceBe;
use App\Http\Controllers\Controller;
use App\Models\Views\VPbbApproval;
use Illuminate\Encryption\Encrypter;
use App\Models\Views\VPbbDaftarPemda;
use Illuminate\Support\Facades\Config;
use App\Models\Views\VPbbDaftarTabungan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;


class ApprovalController extends Controller
{
    public function index()
    {
        $pemda = VPbbDaftarPemda::all();
        $branch = MpBranch::all();
        return view('approval.index', compact('pemda', 'branch'));
    }

    public function list(Request $request)
    {
		userActivities('Post', 'Melakukan List dan Mencari Approval', 'v_pbb_daftar_pemda', 'General', Route::current()->getName());
        if(checkUserPusat()){
            $branchCode = $request->branch;
        }else{
            $branchCode = session('user')->kodeCabang;
        }

        $records      = VPbbApproval::orderBy('pbb_c_updated_date', 'desc');

        if ($branchCode && $branchCode != 'ALL') {
            $records->where('pbb_c_created_office', $branchCode);
        }

        if ($request->pemda) {
            $records->where('mp_p_id', $request->pemda);
        }

        if ($request->nop) {
            $records->where('pbb_c_nop', $request->nop);
        }

        if ($request->nama) {
            $search = $request->nama;
            $records->where(function ($records) use ($search) {
                $records->where('pbb_c_nop_name', 'ilike', "%$search%");
            });
        }

        if ($request->norek) {
            $records->where('pbb_c_src_extacc', $request->norek);
        }

        if ($request->approval) {
            $records->where('pbb_c_approval', $request->approval);
        }

        $resCount   = $records->count();
        $result    = $records->skip($request->start)->take($request->length)->get();
        $no         = $request->start;

        foreach ($result as $row) {
            $row->id        = $row->pbb_c_id;
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

    public function approvalUpdate(Request $request, ServiceBe $serviceBe)
    {
		userActivities('Update', 'Mengubah Approval', 'v_pbb_daftar_pemda', 'General', Route::current()->getName());
        return $serviceBe->sendApproval($request->type, $request->noRef);
    }

    public function rejectUpdate(Request $request)
    {
        try {
            // $tNop = [];
            // foreach($request->noRef as $val){
            //     $tNop[] = $val;
            // }

            $record = MpPbbCustomer::whereIn('pbb_c_id', $request->noRef)
                ->where('pbb_c_approval', '<>', 0)
                ->update(['pbb_c_approval' => 0]);

            $rc = '0000';
            $message = 'Berhasil melakukan reject';
            $data = [];
        } catch (Exception $e) {
            $rc = '0066';
            $message = 'Gagal melakukan reject, ' . $e->getMessage();
            $data = [];
        }
		userActivities('Update', 'Mengubah Reject', 'mp_pbb_customer', 'General', Route::current()->getName());

        $res = [
            'rc'        => $rc,
            'message'   => $message,
            'data'      => $data,
        ];

        return response()->json($res);
    }

    public function checkUser(Request $request)
    {
        try {
            $rules = [
                'username' => 'required',
            ];
            $messages = [
                'username.required' => 'Username tidak valid',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) throw new Exception($validator->errors()->first());

            $encrypter  = new Encrypter(Config::get('app.uim_encrypter'), Config::get('app.uim_string_encrypter'));
            $data       = [
                "userId"    => $request->username,
                "password"  => $encrypter->encrypt($request->password),
                "appId"     => Config::get('app.uim_app_id'),
                "isEncrypted" => true
            ];

            $result = sendAPIUim($data);
            if ($result->statusCode == '200') {
                $role           = SysRole::where('id_fungsi', $result->data->idFungsi)->first();
                $roleApproval = $role->is_approval;
                if ($roleApproval) {
                    $rc = '0000';
                    $message = 'Success';
                    $data = [];
					userActivities('Post', 'Sukses approve', 'mp_pbb_customer', 'General', Route::current()->getName());
                } else {
                    $rc = '0066';
                    $message = 'Gagal, User tidak dapat approve';
                    $data = [];
					userActivities('Post', 'Tidak dapat approve', 'mp_pbb_customer', 'General', Route::current()->getName());
                }
            } else {
                $rc      = $result->statusCode;
                $message    = $result->message;
                $data      = [];
            }
        } catch (Exception $e) {
            $rc = '0066';
            $message = $e->getMessage();
            $data = [];
        }
        $res = [
            'rc'        => $rc,
            'message'   => $message,
            'data'      => $data,
        ];
		

        return response()->json($res);
    }
}
