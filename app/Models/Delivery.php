<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasUuids;

    protected $fillable = [
        'task_id',
        'project_id',
        'user_id',
        'link',
        'feedback',
        'is_best',
        'evaluation',
        'status'
    ];

    //Task

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    //Project

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    //User

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
