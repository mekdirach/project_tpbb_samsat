<?php

namespace App\Exports;

use App\Models\Views\VPbbLaporanBlokir;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\Views\VPbbLaporanPembatalan;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class LaporanBlokirExport extends DefaultValueBinder implements FromView, WithTitle, WithCustomValueBinder
{
    public $request = null;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function title(): string
    {
        return 'Blokir';
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
        $nop = isset($request['mNop']) ? $request['mNop'] : null;
        $nama = isset($request['mNama']) ? $request['mNama'] : null;
        $norek = isset($request['mNorek']) ? $request['mNorek'] : null;
        $start = isset($request['mStart']) ? $request['mStart'] : null;
        $end = isset($request['mEnd']) ? $request['mEnd'] : null;

        $records      = VPbbLaporanBlokir::orderBy('mp_pbb_ab_tgl_blokir', 'asc');

        if ($branch && $branch != 'ALL') {
            $records->where('pbb_c_created_office', $branch);
        }

        if($pemda){
            $records->where('mp_p_id', $pemda);
        }

        if($nop){
            $records->where('mp_pbb_ab_nop', $nop);
        }

        if($nama){
            $search = $nama;
            $records->where(function($records) use($search){
                $records->where('mp_pbb_cl_nop_name', 'ilike', "%$search%");
            });
        }

        if($norek){
            $records->where('mp_pbb_ab_src_extacc', $norek);
        }

        if($start){
            $records->where('mp_pbb_ab_tgl_blokir', '>=', "$start 00:00:00");
        }

        if($end){
            $records->where('mp_pbb_ab_tgl_blokir', '<=', "$end 23:59:59");
        }

        $records = $records->get();

        return view('exports.excel.laporan-blokir', compact('records'));
    }
}
