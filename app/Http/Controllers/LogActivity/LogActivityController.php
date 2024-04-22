<?php

namespace App\Http\Controllers\LogActivity;

use App\Models\MpBranch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserActivity;
use Illuminate\Support\Facades\DB;

class LogActivityController extends Controller
{
    public function index()
    {
        $activity = UserActivity::all();
        $branch = MpBranch::all();
        return view('log-activity.index', compact('activity', 'branch'));
    }

    public function list(Request $request)
    {
        $records      = UserActivity::orderBy('cua_dt', 'desc');

        if ($request->nop) {
            $search = $request->nop;
            $records->where(function ($records) use ($search) {
                $records->where('cua_by_uid', 'ilike', "%$search%");
            });
        }

        if ($request->branch) {
            $search = $request->branch;
            $records->where(function ($records) use ($search) {
                $records->where('branch_code', 'ilike', "%$search%");
            });
        }

        if ($request->kategori) {
            $search = $request->kategori;
            $records->where(function ($records) use ($search) {
                $records->where('cua_desc', 'ilike', "%$search%");
            });
        }
        if ($request->start_date) {
            $records->where('cua_dt', '>=', "$request->start_date 00:00:00");
        }

        if ($request->end_date) {
            $records->where('cua_dt', '<=', "$request->end_date 23:59:59");
        }

        $resCount   = $records->count();
        $result    = $records->skip($request->start)->take($request->length)->get();
        $no         = $request->start;

        foreach ($result as $row) {
            $row->id        = $row->pbb_c_nop;
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
}
