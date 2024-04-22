<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpDownloadManager extends Model
{
    use HasFactory;
    protected $table = 'mp_download_manager';
    public $timestamps = false;
}
