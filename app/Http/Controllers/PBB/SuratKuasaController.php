<?php

namespace App\Http\Controllers\PBB;

use Exception;
use Illuminate\Http\Request;
use App\Models\MpPbbCustomer;
use PhpOffice\PhpWord\IOFactory;
use App\Models\MpMasterSuratKuasa;
use App\Http\Controllers\Controller;
use App\Models\Views\VPbbDaftarPemda;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Models\Views\VPbbDaftarTabungan;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratKuasaController extends Controller
{
    public function index() {
        $pemda = VPbbDaftarPemda::all();
        $template = MpMasterSuratKuasa::where('status', 1)->get();
        $tJson = json_decode($template);
        return view('pbb.surat-kuasa.index', compact('pemda', 'tJson'));
    }

    public function detail(Request $request) {
        $record = MpPbbCustomer::where('pbb_c_nop', $request->nop)
        ->where('pbb_c_tahun', $request->tahunPajak)
        ->where('pbb_c_pemda_id', $request->pemdaID)
        ->where('pbb_c_src_extacc', $request->accountNumber)
        ->first();

        if ($record) {
            $rc = '0000';
            $message = 'Data Ditemukan';
        } else {
            $rc = '0066';
            $message = 'Data Tidak Ditemukan';
        }

        $res = [
            'rc'        => $rc,
            'message'   => $message,
            'data'      => $record,
        ];
		userActivities('Detail', 'Melakukan Detail Surat Kuasa', 'mp_pbb_customer', 'General', Route::current()->getName());

        return response()->json($res);
    }

    public function generateDocx(Request $request) {
        try {
            $record = MpMasterSuratKuasa::findOrFail($request->jenis_surat);
            $parameter = explode(',', $record->parameter_template);

            $values = [];
            foreach ($parameter as $param) {
                $values[$param] = $request->input($param);
            }

            $date = date("j F Y");
            $hari = date("l");

            $time = [
                'hari'      => $hari,
                'tanggal'   => $date,
                'cabang'    => Session::get('user')->namaCabang,
            ];

            $content = array_merge($values, $time);

            $doc = new TemplateProcessor('template/'. $record->file_template);
            $doc->setValues($content);

            $filename = $request->nama_template . ' - ' . $request->pbb_c_nop . '.docx';
            $doc->saveAs('surat-kuasa/'. $filename);

            $path = Config::get('app.app_url') . 'surat-kuasa/' .$filename;
            
            // if ($request->jenis_surat == 'autoblokir') {
            //     $doc = new TemplateProcessor('autoblokir.docx');
            //     $doc->setValues([
            //         'nama'      => $request->nama,
            //         'norek'     => $request->norek,
            //         'alamat'    => $request->alamat,
            //         'nop'       => $request->nop,
            //         'kota'      => $request->kota,
            //         'tahun'     => $request->tahun,
            //         'identitas' => $request->nik,
            //         'hari'      => $hari,
            //         'tanggal'   => $date,
            //         'cabang'    => Session::get('user')->namaCabang,
            //     ]);

            //     $filename = 'Surat Kuasa Autoblokir - '. $request->nop . '.docx';
            //     $doc->saveAs('surat-kuasa/'. $filename);

            //     $path = Config::get('app.app_url') . 'surat-kuasa/' .$filename;
            // }else if ($request->jenis_surat == 'sekaligus') {
            //     $doc = new TemplateProcessor('sekaligus.docx');
            //     $doc->setValues([
            //         'nama'      => $request->nama,
            //         'norek'     => $request->norek,
            //         'alamat'    => $request->alamat,
            //         'nop'       => $request->nop,
            //         'kota'      => $request->kota,
            //         'tahun'     => $request->tahun,
            //         'nominal'   => $request->amount,
            //         'tgl_awal'  => $request->tgl_awal_blokir,
            //         'tgl_akhir' => $request->tgl_akhir_blokir,
            //         'hari'      => $hari,
            //         'tanggal'   => $date,
            //         'cabang'    => Session::get('user')->namaCabang,
            //     ]);

            //     $filename = 'Surat Kuasa Autoblokir Sekaligus - '. $request->nop . '.docx';
            //     $doc->saveAs('surat-kuasa/'. $filename);

            //     $path = Config::get('app.app_url') . 'surat-kuasa/' .$filename;
            // }else if ($request->jenis_surat == 'pembatalan') {
            //     $doc = new TemplateProcessor('pembatalan.docx');
            //     $doc->setValues([
            //         'nama'      => $request->nama,
            //         'norek'     => $request->norek,
            //         'alamat'    => $request->alamat,
            //         'nop'       => $request->nop,
            //         'kota'      => $request->kota,
            //         'tahun'     => $request->tahun,
            //         'kontak'    => $request->phone . '-' . $request->mail,
            //         'hari'      => $hari,
            //         'tanggal'   => $date,
            //         'cabang'    => Session::get('user')->namaCabang,
            //     ]);

            //     $filename = 'Surat Pembatalan - '. $request->nop . '.docx';
            //     $doc->saveAs('pembatalan/'. $filename);

            //     $path = Config::get('app.app_url') . 'pembatalan/' .$filename;
            // }

            $message    = 'Berhasil Generate Dokumen, silahkan download <a href="'. $path .'">di sini</a>' ;
            $alert      = 'success';
        } catch (Exception $e) {
            $message    = 'Gagal Generate Dokumen '.$e;
            $alert      = 'danger';
        }

        $return = [
            'message'       => $message,
            'alert-type'    => $alert
        ];
        return back()->with($return);
    }
}
