<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
       use HasFactory;
    protected $table = 'cl_user_activity';
    protected $primaryKey = 'cua_id';
    public $timestamps = false;

    protected $fillable = [
        'cua_id',
    ];
}
