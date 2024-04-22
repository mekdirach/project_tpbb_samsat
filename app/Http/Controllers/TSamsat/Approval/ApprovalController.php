<?php

namespace App\Http\Controllers\TSamsat\Approval;

use Exception;
use App\Models\SysRole;
use App\Models\MpBranch;
use App\Models\MpCustomer;
use Illuminate\Http\Request;
use App\services\BE\ServiceBe;
use App\Models\MpMasterProvinsi;
use App\Http\Controllers\Controller;
use Illuminate\Encryption\Encrypter;
use App\Models\Views\VSamsatApproval;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class ApprovalController extends Controller
{
    public function index()
    {
        $pemda = MpMasterProvinsi::all();
        $branch = MpBranch::all();
        return view('t-samsat.approval.index', compact('pemda', 'branch'));
    }

    public function list(Request $request)
    {
		userActivities('Post', 'Melakukan List dan Mencari Approval', 'v_pbb_daftar_pemda', 'General', Route::current()->getName());
        if(checkUserPusat()){
            $branchCode = $request->branch;
        }else{
            $branchCode = session('user')->kodeCabang;
        }

        $records      = VSamsatApproval::orderBy('updated_at', 'desc');

        if ($branchCode && $branchCode != 'ALL') {
            $records->where('created_office', $branchCode);
        }

        if ($request->pemda) {
            $records->where('mp_mp_kode', $request->pemda);
        }

        if ($request->nopol) {
            $records->where('nomor_polisi', $request->nopol);
        }

        if ($request->nama) {
            $search = $request->nama;
            $records->where(function ($records) use ($search) {
                $records->where('nm_pemilik', 'ilike', "%$search%");
            });
        }

        if ($request->norek) {
            $records->where('rekening_external', $request->norek);
        }

        if ($request->approval) {
            $records->where('status_approval', $request->approval);
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

    public function approvaRegistrasilUpdate(Request $request, ServiceBe $serviceBe)
    {
		userActivities('Update', 'Mengubah Approval', 'v_pbb_daftar_pemda', 'General', Route::current()->getName());
        return $serviceBe->approvalRegTsamsat($request->mData);
    }

    public function approvalPembatalanUpdate(Request $request, ServiceBe $serviceBe)
    {
		userActivities('Update', 'Mengubah Approval', 'v_pbb_daftar_pemda', 'General', Route::current()->getName());
        return $serviceBe->approvalPembatalanTsamsat($request->mData);
    }

    public function approvalPembatalanAroUpdate(Request $request, ServiceBe $serviceBe)
    {
		userActivities('Update', 'Mengubah Approval', 'v_pbb_daftar_pemda', 'General', Route::current()->getName());
        return $serviceBe->approvalPembatalanAroTsamsat($request->mData);
    }

    public function rejectUpdate(Request $request)
    {
        try {

            $record = MpCustomer::whereIn('nomor_polisi', $request->nopol)
                ->where('status_approval', '<>', 0)
                ->update(['status_approval' => 0]);

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
