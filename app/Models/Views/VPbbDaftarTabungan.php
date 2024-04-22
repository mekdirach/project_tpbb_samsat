<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VPbbDaftarTabungan extends Model
{
    use HasFactory;
    protected $table        = 'v_pbb_daftar_tabungan';
    public $incrementing    = false;
    public $timestamps      = false;
    use HasFactory;


    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
