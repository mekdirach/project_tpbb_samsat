<?php

namespace App\Http\Controllers\ManagementApp;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management-app.account-type.index');
    }

    public function list(Request $request)
    {
        $query      = DB::table('mp_pbb_acc_type AS a')
            ->select('a.account_type', 'a.account_type_name', 'a.created_at', 'a.created_by', 'a.status_aktif')
            ->skip($request->start)
            ->take($request->length)
            ->orderBy('account_type', 'asc');

        if ($request->keyword) {
            $search = $request->keyword;
            $query->where(function ($query) use ($search) {
                $query->where('account_type_name', 'ilike', "%$search%")
                    ->orWhere('account_type', 'ilike', "%$search%");
            });
        }

        $result     = $query->get();
        $resCount   = $query->count();
        $no         = $request->start;

        foreach ($result as $row) {
            $row->id        = $row->account_type;
            $row->rownum    = ++$no;
        }
		userActivities('Post', 'Melakukan Pencarian Account-type', 'mp_pbb_acc_type', 'General', Route::current()->getName());

        $response = [
            "draw"              => $request->draw,
            "recordsTotal"      => $resCount,
            "recordsFiltered"   => $resCount,
            "data"              => $result
        ];
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		userActivities('Post', 'Menambahkan Account-type', 'mp_pbb_acc_type', 'General', Route::current()->getName());
        $request->validate([
            'name' => 'required|string',
        ]);

        $newData = [
            'account_type'        => strtoupper($request->input('name')),
            'account_type_name'        => $request->input('deskripsi'),
            'created_at'  => Carbon::now('Asia/Jakarta'),
            'created_by'  => Session('user')->nama,
            'status_aktif'        => $request->input('isactive'),
        ];

        $record = DB::table('mp_pbb_acc_type')->insert($newData);

        // Berikan respons berdasarkan keberhasilan operasi
        if ($record) {
            $message    = "Berhasil menambahkan data!";
            $rc         = "0000";
        } else {
            $message    = "Gagal menambahkan data!";
            $rc         = "0066";
        }

        $result = [
            "rc"        => $rc,
            "message"   => $message
        ];

        return response()->json($result);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $record = DB::table('mp_pbb_acc_type')->where('account_type', $request->id)->first();
        return response()->json($record);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $record = [
            'account_type'        => strtoupper($request->input('name')),
            'account_type_name'        => $request->input('deskripsi'),
            'created_at'  => Carbon::now('Asia/Jakarta'),
            'created_by'  => Session('user')->nama,
            'status_aktif'        => $request->input('isactive'),
        ];
		userActivities('Post', 'Mengubah Account-type', 'mp_pbb_acc_type', 'General', Route::current()->getName());
        // Pastikan rekord ditemukan sebelum mencoba memperbarui
        $affectedRows = DB::table('mp_pbb_acc_type')->where('account_type', $request->account_id)->update($record);

        // Berikan respons berdasarkan keberhasilan operasi
        if ($affectedRows > 0) {
            $message = "Berhasil mengubah data!";
            $rc = "0000";
        } else {
            $message = "Gagal mengubah data! Rekord tidak ditemukan.";
            $rc = "0066";
        }

        $result = [
            "rc"        => $rc,
            "message"   => $message
        ];

        return response()->json($result);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
