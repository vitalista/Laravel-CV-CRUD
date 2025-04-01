<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cvs extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'cvs';
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'full_name',
        'objective',
        'email',
        'phone_number',
        'skills',
        'work_experince',
    ];
}
