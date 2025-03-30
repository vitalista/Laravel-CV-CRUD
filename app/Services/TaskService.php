<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getById(int $id)
    {
        return Task::where('id', $id)->whereNull('deleted_at')->first();
    }
}