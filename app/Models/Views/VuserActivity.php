<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VuserActivity extends Model
{
    use HasFactory;
    protected $table = 'v_user_activity';
    public $timestamps = false;
}
