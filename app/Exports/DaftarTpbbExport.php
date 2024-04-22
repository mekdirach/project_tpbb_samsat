<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use App\Models\Views\VPbbDaftarTabungan;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class DaftarTpbbExport extends DefaultValueBinder implements FromView, WithTitle, WithCustomValueBinder
{
    public $request = null;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function title(): string
    {
        return 'Daftar t-PBB';
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

        $records      = VPbbDaftarTabungan::orderBy('mp_p_id', 'asc');

        if($branch && $branch != 'ALL'){
            $records->where('pbb_c_created_office', $branch);
        }

        if($pemda){
            $records->where('mp_p_id', $pemda);
        }

        if($nop){
            $records->where('pbb_c_nop', $nop);
        }

        if($nama){
            $search = $nama;
            $records->where(function($records) use($search){
                $records->where('pbb_c_nop_name', 'ilike', "%$search%");
            });
        }

        if($norek){
            $records->where('pbb_c_src_extacc', $norek);
        }

        $records = $records->get();

        return view('exports.excel.daftar-tpbb', compact('records'));
    }
}
