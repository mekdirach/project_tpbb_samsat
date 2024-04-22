<?php

namespace App\Http\Controllers\ManagementApp;

use App\Http\Controllers\Controller;
use App\Models\MpMasterKotaKabupaten;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management-app.provinsi.index');
    }

    public function list(Request $request)
    {
        $query = DB::table('mp_master_kota_kabupaten AS b')
            ->select('a.mp_mp_kode', 'a.mp_mp_status', 'a.mp_mp_nama', 'a.mp_mp_created_at', 'a.mp_mp_created_by', 'a.mp_mp_status', 'b.mp_mkk_kode')
            ->join('mp_master_provinsi AS a', 'a.mp_mp_kode', '=', 'b.mp_mkk_kode_provinsi')
            ->orderBy('mp_mp_kode', 'asc');


        if ($request->keyword) {
            $search = $request->keyword;
            $query->where(function ($query) use ($search) {
                $query->where('mp_mp_nama', 'ilike', "%$search%");
            });
        }

        $resCount   = $query->count();
        $result    = $query->skip($request->start)->take($request->length)->get();
        $no         = $request->start;

        foreach ($result as $row) {
            $row->id        = $row->mp_mp_kode;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
        ]);

        $newData = [
            'pbb_p_name'        => strtoupper($request->input('name')),
            'pbb_p_created_at'  => Carbon::now('Asia/Jakarta'),
        ];
        $record = DB::table('mp_pbb_parameter')->insert($newData);

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
        $record = DB::table('mp_master_kota_kabupaten')
            ->select('mp_master_kota_kabupaten.mp_mkk_kode_provinsi', 'mp_master_kota_kabupaten.mp_mkk_nama', 'mp_master_kota_kabupaten.mp_mkk_created_by', 'mp_master_kota_kabupaten.mp_mkk_created_date', 'mp_master_provinsi.mp_mp_nama', 'mp_master_provinsi.mp_mp_status', 'mp_master_provinsi.mp_mp_created_by', 'mp_master_provinsi.mp_mp_created_at')
            ->join('mp_master_provinsi', 'mp_master_kota_kabupaten.mp_mkk_kode_provinsi', '=', 'mp_master_provinsi.mp_mp_kode')
            ->where('mp_master_kota_kabupaten.mp_mkk_kode', $request->id)
            ->first();


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
            'pbb_p_name'        => strtoupper($request->input('name')),
            'pbb_p_updated_at'  => now()->setTimezone('Asia/Jakarta'),
            'pbb_p_updated_by'  => Session('user')->nama,
        ];

        // Pastikan rekord ditemukan sebelum mencoba memperbarui
        $affectedRows = DB::table('mp_pbb_parameter')->where('pbb_p_id', $request->param_id)->update($record);

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
