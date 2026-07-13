<?php

namespace App\Models;

use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, HasUuids, HasSearch;

    public function casts():array
    {
        return[
            'close_at' => 'datetime'
        ];
    }

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'budget',
        'status'
    ];

    //Project

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    //Users

    public function users()
    {
        return $this->belongsToMany(User::class , 'user_tasks');
    }

    //Deliveries

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    //User Tasks

    public function userTasks()
    {
        return $this->hasMany(UserTask::class);
    }

    //Attachments

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    //Comments

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
