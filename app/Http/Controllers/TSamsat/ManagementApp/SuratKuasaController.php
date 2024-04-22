<?php

namespace App\Http\Controllers\TSamsat\ManagementApp;

use Exception;
use Illuminate\Http\Request;
use App\services\BE\ServiceBe;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use App\Models\MpMasterSuratKuasa;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\Shared\Html;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\Writer\HTML as wHTML;

class SuratKuasaController extends Controller
{
    public function index()
    {
        $data = MpMasterSuratKuasa::all();
        return view('t-samsat.management-app.surat-kuasa.index', compact('data'));
    }

    public function list(Request $request)
    {
        $records      = MpMasterSuratKuasa::orderBy('created_at', 'desc')
        ->where('kode_suratkuasa', 's');
        if ($request->keyword) {
            $search = $request->keyword;
            $records->where(function ($records) use ($search) {
                $records->where('name', 'ilike', "%$search%");
            });
        }

        $resCount   = $records->count();
        $result    = $records->skip($request->start)->take($request->length)->get();
        $no         = $request->start;

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

    public function createPage() {
        $fields = Schema::getColumnListing('v_samsat_daftar_tabungan');
        return view('t-samsat.management-app.surat-kuasa.content.create', compact('fields'));
    }

    public function create(Request $request)
    {
        try {
            $content = $request->input('template');
            $params = implode(',', $request->parameter ?? []);

            $phpWord = new PhpWord();
            $section = $phpWord->addSection();
            \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
            // \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content, false, false);
            $text = addNamespaces($content);
            Html::addHtml($section, $text);
            $filename = 'template/' . $request->nama_surat . '.docx';
            if ($phpWord->save($filename, 'Word2007')) {
                $record = new MpMasterSuratKuasa();
                $record->kode_suratkuasa = 's';
                $record->nama_template = $request->nama_surat;
                $record->file_template = $request->nama_surat . '.docx';
                $record->parameter_template = $params;
                $record->status = $request->isactive;
                $record->created_office = Session::get('user')->namaCabang;
                $record->created_by = Session::get('user')->userId;
                $record->created_at = date('y-m-d h:m:s');
                $record->save();
            }

            $message = 'Data berhasil ditambahkan';
            $alert = 'success';
        } catch (Exception $e) {
            $message = 'Data gagal ditambahkan, ' . $e;
            $alert = 'danger';
        }

        $result = redirect()->route('management-app.surat-kuasa-samsat')->with([
            'message'     => $message,
            'alert-type'  => $alert
        ]);

        return $result;
    }

    public function detail(Request $request)
    {
        $record = MpMasterSuratKuasa::findOrFail($request->id);
        return response()->json($record);
    }

    public function show($id)
    {
        $fields = Schema::getColumnListing('v_samsat_daftar_tabungan');
        $record = MpMasterSuratKuasa::where('id', $id)->first();
        $filePath = public_path('template/' . $record->file_template);
        $parameter = explode(',', $record->parameter_template);

        $values = [];
        foreach ($parameter as $param) {
            $values[] = $param;
        }

        $phpWord = IOFactory::load($filePath);
        $createHTML = new wHTML($phpWord);
        $content = $createHTML->getContent();
        return view('t-samsat.management-app.surat-kuasa.index', compact('fields', 'record', 'content', 'values'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fields = Schema::getColumnListing('v_samsat_daftar_tabungan');
        $record = MpMasterSuratKuasa::where('id', $id)->first();
        $filePath = public_path('template/' . $record->file_template);
        $parameter = explode(',', $record->parameter_template);

        $values = [];
        foreach ($parameter as $param) {
            $values[] = $param;
        }

        $phpWord = IOFactory::load($filePath);
        $createHTML = new wHTML($phpWord);
        $content = $createHTML->getContent();
        return view('t-samsat.management-app.surat-kuasa.index', compact('fields', 'record', 'content', 'values'));
    }

    public function update(Request $request)
    {
        try {
            $content = $request->input('template');
            $params = implode(',', $request->parameter ?? []);

            $record = MpMasterSuratKuasa::findOrFail($request->id);
            $record->nama_template = $request->nama_surat;
            // $record->file_template = $request->nama_surat . '.docx';
            $record->parameter_template = $params;
            $record->status = $request->isactive;
            $record->created_office = Session::get('user')->namaCabang;
            $record->created_by = Session::get('user')->userId;
            $record->created_at = date('y-m-d h:m:s');

            if ($record->save()) {
                $phpWord = new PhpWord();
                $section = $phpWord->addSection();
                \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
                $text = addNamespaces($content);
                Html::addHtml($section, $text);
                $filename = 'template/' . $request->file_template;
                $phpWord->save($filename, 'Word2007');
            }

            $message = 'Data berhasil diubah';
            $alert = 'success';
        } catch (Exception $e) {
            $message = 'Data gagal diubah, ' . $e;
            $alert = 'danger';
        }

        $result = redirect()->route('management-app.surat-kuasa-samsat')->with([
            'message'     => $message,
            'alert-type'  => $alert
        ]);

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $record = MpMasterSuratKuasa::findOrFail($id);
            $record->delete();

            $rc = '0000';
            $message = 'Data berhasil dihapus';
            $data = [];
        } catch (Exception $e) {
            $rc = '0066';
            $message = 'Data gagal dihapus, ' . $e->getMessage();
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
