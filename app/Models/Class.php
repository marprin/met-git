<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Class extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [

    ];
    protected $hidden = ['created_at', 'updated_at'];
}
