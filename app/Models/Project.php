<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Attachment;
use App\Observers\ProjectObserve;
use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, HasUuids, HasSearch;

    public static function booted()
    {
        static::observe(new ProjectObserve());
    }

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'category',
        'status',
        'type',
        'budget',
    ];

    //User

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Trancactions

    public function transactions()
    {
        return $this->morphMany(Transaction::class , 'transactionable');
    }

    //Tasks

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    //Deliveries

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    //Comments

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    //Attachments

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
