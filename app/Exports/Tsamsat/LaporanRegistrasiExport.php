<?php

namespace App\Exports\Tsamsat;

use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\Views\VPbbLaporanPembatalan;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use App\Models\Views\VSamsatLaporanPembatalan;
use App\Models\Views\VSamsatLaporanPendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class LaporanRegistrasiExport extends DefaultValueBinder implements FromView, WithTitle, WithCustomValueBinder
{
    public $request = null;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function title(): string
    {
        return 'Registrasi';
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
        $start = isset($request['mStart']) ? $request['mStart'] : null;
        $end = isset($request['mEnd']) ? $request['mEnd'] : null;

        $records      = VSamsatLaporanPendaftaran::orderBy('registrasi_tgl', 'asc');

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

        if($start){
            $records->where('registrasi_tgl', '>=', "$start 00:00:00");
        }

        if($end){
            $records->where('registrasi_tgl', '<=', "$end 23:59:59");
        }

        $records = $records->get();

        return view('exports.tsamsat.excel.laporan-registrasi', compact('records'));
    }
}
