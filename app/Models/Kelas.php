<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;
    protected $table = 'classes';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'class'
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
