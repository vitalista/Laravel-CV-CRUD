<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $fillable = [
        'id', // primary key, auto-increment, integer
        'project_id', // foreign key, integer
        'priority', // integer
        'title', // string
        'description', // text
    ];
    protected $appends = [
        'Created', // already appended created_at
        'Updated', // append updated_at in a human-readable format
    ];

    protected $hidden = ['project_id'];

    public function getCreatedAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    // Add this method for updated_at human-readable format
    public function getUpdatedAttribute()
    {
        return $this->updated_at->diffForHumans();
    }
}
