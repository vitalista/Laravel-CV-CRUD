<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'education';
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'tertiary',
        'tertiary_sy_start',
        'tertiary_sy_end',
        'secondary',
        'secondary_sy_start',
        'secondary_sy_end',
        'primary',
        'primary_sy_start',
        'primary_sy_end',
    ];
}
