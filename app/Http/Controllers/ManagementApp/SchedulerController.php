<?php

namespace App\Http\Controllers\ManagementApp;

use App\Http\Controllers\Controller;
use App\Models\MpSchedulerParameter;
use App\services\BE\ServiceBe;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


class SchedulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MpSchedulerParameter::all();
        return view('management-app.scheduler.index', compact('data'));
    }

    public function list(Request $request)
    {
        $records      = MpSchedulerParameter::orderBy('start_time', 'desc');
        if ($request->keyword) {
            $search = $request->keyword;
            $records->where(function ($records) use ($search) {
                $records->where('name', 'ilike', "%$search%");
            });
        }

        $resCount   = $records->count();
        $result    = $records->skip($request->start)->take($request->length)->get();
        $no         = $request->start;
		userActivities('Post', 'Melakukan Pencarian Scheduler', 'SchedulerParameter', 'General', Route::current()->getName());

        foreach ($result as $row) {
            $row->id        = $row->id;
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

    public function create(Request $request)
    {

        $request->validate([
            'nama_scheduler' => 'required|string',
        ]);

        $newData = [
            'name'        => strtoupper($request->input('nama_scheduler')),
            'status'  => $request->input('isactive'),
            'description'  => $request->input('deskripsi'),
            'id'  => $request->input('kode_scheduler'),
            'start_time'  => $request->input('_time'),
        ];
        $record = DB::table('mp_scheduler_parameter')->insert($newData);
		userActivities('Create', 'Menambahkan Scheduler', 'SchedulerParameter', 'General', Route::current()->getName());

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

    public function detail(Request $request)
    {
        $record = MpSchedulerParameter::findOrFail($request->id);
        return response()->json($record);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ServiceBe $servisBe)
    {


        // $apiUrl = 'http://192.168.26.76:30004/api/scheduler/update-delete-job';

        $request->merge([
            "status" => $request->isactive,
            "startTime" => $request->_time,
            'id' => $request->kode_scheduler,
            'name' => $request->nama_scheduler,
        ]);
		userActivities('Update', 'Mengubah Scheduler', 'SchedulerParameter', 'General', Route::current()->getName());

        // var_dump("kasld ", $request);

        return $servisBe->updateScheduler($request);
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
