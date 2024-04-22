<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Views\VPbbDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


class VPbbDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function samsat()
    {
        return view('dashboard');
    }

    public function fetchData()
    {
        $userData = session('user');

          if (isset($userData->kodeCabang) && (substr($userData->kodeCabang, 0, 1) == 'D' || substr($userData->kodeCabang, 0, 1) == 'd')) {
            $data = DB::table('v_dashboard_pbb')
                ->selectRaw('SUM(tabungan_terdaftar) as tabungan_terdaftar,
                             SUM(tabungan_aktif) as tabungan_aktif,
                             SUM(tabungan_dibatalkan) as tabungan_dibatalkan,
                             SUM(tabungan_lunas) as tabungan_lunas,
                             max(sampai_tanggal_aktif) AS sampai_tanggal_aktif,
                             max(sampai_tanggal_dibatalkan) AS sampai_tanggal_dibatalkan,
                             max(sampai_tanggal_lunas) AS sampai_tanggal_lunas,
                             max(sampai_tanggal_terdaftar) AS sampai_tanggal_terdaftar')
                ->first();
        } else {

            $kodeCabang = $userData->kodeCabang;
            $data = DB::table('v_dashboard_pbb')->where('kantor_cabang',  $kodeCabang)->first();

        }
		userActivities('Update', 'Dashboard', 'v_dashboard_pbb', 'General', Route::current()->getName());
        return response()->json($data);
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
     * @param  \App\Models\view\VPbbDashboard  $vPbbDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(VPbbDashboard $vPbbDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\view\VPbbDashboard  $vPbbDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(VPbbDashboard $vPbbDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\view\VPbbDashboard  $vPbbDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VPbbDashboard $vPbbDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\view\VPbbDashboard  $vPbbDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(VPbbDashboard $vPbbDashboard)
    {
        //
    }
}
