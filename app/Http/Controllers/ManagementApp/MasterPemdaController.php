<?php

namespace App\Http\Controllers\ManagementApp;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class MasterPemdaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management-app.pemda.index');
    }

    public function list(Request $request)
    {
		userActivities('Post', 'Melakukan Pencarian Pemda', 'mp_pbb_pemda', 'General', Route::current()->getName());
        $query = DB::table('mp_pbb_pemda AS a')
            ->select('a.mp_p_id', 'a.mp_p_nama', 'a.mp_p_created_by', 'a.mp_p_created_date', 'a.mp_p_status', 'b.mp_mkk_nama')
            ->join('mp_master_kota_kabupaten AS b', 'a.mp_p_mkk_id', '=', 'b.mp_mkk_kode')
            ->skip($request->start)
            ->take($request->length)
            ->orderBy('mp_p_id', 'asc');


        if ($request->keyword) {
            $search = $request->keyword;
            $query->where(function ($query) use ($search) {
                $query->where('mp_p_nama', 'ilike', "%$search%");
            });
        }

        $result     = $query->get();
        $resCount   = $query->count();
        $no         = $request->start;

        foreach ($result as $row) {
            $row->id        = $row->mp_p_id;
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
	userActivities('Post', 'Menambahkan Pemda', 'mp_pbb_pemda', 'General', Route::current()->getName());
        $request->validate([
            'name_pemda' => 'required|string',
        ]);
        $namakota = $request->input('name_kota');
        $mp_mkk_nama = DB::table('mp_master_kota_kabupaten')
            ->where('mp_mkk_nama', 'ilike', "%$namakota%")
            ->value('mp_mkk_kode');


        $newData = [
            'mp_p_id'        => $request->input('kode_pemda'),
            'mp_p_nama'  => $request->input('name_pemda'),
            'mp_p_mkk_id'        => $mp_mkk_nama,
            'mp_p_fee'  => $request->input('biaya_admin'),
            'mp_p_min_fee'        => $request->input('transaksi'),
            'mp_p_pembayaran_cutoff'  => $request->input('cut_off'),
            'mp_p_pembayaran_date'        => $request->input('date'),
            'mp_p_status'  => $request->input('isactive'),
            'mp_p_created_by'        => Session('user')->nama,
            'mp_p_created_date'  => Carbon::now('Asia/Jakarta'),
        ];
        $record = DB::table('mp_pbb_pemda')->insert($newData);

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
    public function show($id)
    {
        // $record = DB::table('mp_pbb_pemda')->where('mp_p_id', $request->id)->first();

        $record = DB::table('mp_pbb_pemda AS a')
            ->select('a.mp_p_id', 'a.mp_p_nama', 'a.mp_p_fee', 'a.mp_p_min_fee', 'a.mp_p_pembayaran_cutoff', 'a.mp_p_pembayaran_date', 'b.mp_mkk_nama')
            ->join('mp_master_kota_kabupaten AS b', 'a.mp_p_mkk_id', '=', 'b.mp_mkk_kode')
            ->where('a.mp_p_id', $id)
            ->first();

        return view('management-app.pemda.index', compact('record'));
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
            'name_pemda' => 'required|string',
        ]);

        $namakota = $request->input('name_kota');
        $mp_mkk_nama = DB::table('mp_master_kota_kabupaten')
            ->where('mp_mkk_nama', 'ilike', "%$namakota%")
            ->value('mp_mkk_kode');


        $record = [
            'mp_p_id'        => $request->input('kode_pemda'),
            'mp_p_nama'  => $request->input('name_pemda'),
            'mp_p_mkk_id'        => $mp_mkk_nama,
            'mp_p_fee'  => $request->input('biaya_admin'),
            'mp_p_min_fee'        => $request->input('transaksi'),
            'mp_p_pembayaran_cutoff'  => $request->input('cut_off'),
            'mp_p_pembayaran_date'        => $request->input('date'),
            'mp_p_status'  => $request->input('isactive'),
            'mp_p_created_by'        => Session('user')->nama,
            'mp_p_created_date'  => Carbon::now('Asia/Jakarta'),
        ];

        // Pastikan rekord ditemukan sebelum mencoba memperbarui
        $affectedRows = DB::table('mp_pbb_pemda')->where('mp_p_id', $request->pemda_id)->update($record);
		userActivities('Post', 'Mengubah Pemda', 'mp_pbb_pemda', 'General', Route::current()->getName());

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

    public function detail(Request $request)
    {
        // $record = DB::table('mp_pbb_pemda')->where('mp_p_id', $request->id)->first();

        $record = DB::table('mp_pbb_pemda AS a')
            ->select('a.mp_p_id', 'a.mp_p_nama', 'a.mp_p_fee', 'a.mp_p_min_fee', 'a.mp_p_pembayaran_cutoff', 'a.mp_p_pembayaran_date', 'b.mp_mkk_nama')
            ->join('mp_master_kota_kabupaten AS b', 'a.mp_p_mkk_id', '=', 'b.mp_mkk_kode')
            ->where('a.mp_p_id', $request->id)
            ->first();
			userActivities('Post', 'Melakukan Detail Pemda', 'mp_pbb_pemda', 'General', Route::current()->getName());

        return response()->json($record);
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
