<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Application extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'application';
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'cv_id',
        'company',
        'application_status',
        'application_link',
    ];

    public function cvs()
    {
        return $this->belongsTo(Cvs::class, 'cv_id', 'id');
    }
    
}
