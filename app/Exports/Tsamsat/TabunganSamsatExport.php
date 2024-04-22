<?php

namespace App\Exports\Tsamsat;

use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use App\Models\Views\VPbbDaftarTabungan;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\Views\VSamsatDaftarTabungan;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class TabunganSamasatExport extends DefaultValueBinder implements FromView, WithTitle, WithCustomValueBinder
{
    public $request = null;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function title(): string
    {
        return 'Daftar Tabungan Samsat';
    }

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    public function view(): View
    {
        $request = $this->request;
        $branch = isset($request['mBranch']) ? $request['mBranch'] : null;
        $pemda = isset($request['mPemda']) ? $request['mPemda'] : null;
        $nopol = isset($request['mNopol']) ? $request['mNopol'] : null;
        $nama = isset($request['mNama']) ? $request['mNama'] : null;
        $norek = isset($request['mNorek']) ? $request['mNorek'] : null;

        $records      = VSamsatDaftarTabungan::orderBy('registrasi_tgl', 'asc');

        if ($branch && $branch != 'ALL') {
            $records->where('created_office', $branch);
        }

        if($pemda){
            $records->where('mp_mp_kode', $pemda);
        }

        if($nopol){
            $records->where('nomor_polisi', $nopol);
        }

        if($nama){
            $search = $nama;
            $records->where(function($records) use($search){
                $records->where('nm_pemilik', 'ilike', "%$search%");
            });
        }

        if($norek){
            $records->where('rekening_external', $norek);
        }

        $records = $records->get();

        return view('exports.tsamsat.excel.daftar-tsamsat', compact('records'));
    }
}
