<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserTask extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'project_id',
        'task_id'
    ];

    public function scopecheck(Builder $builder , $id)
    {
        return $builder->where('user_id' , Auth::id())->where('task_id' , $id)->exists();;
    }

    //Task

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
