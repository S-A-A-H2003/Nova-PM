<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Observers\UserObserve;
use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids , HasSearch;


    public static function booted()
    {
        static::observe(new UserObserve());
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function information()
    {
        return $this->hasOne(Information::class);
    }

    public function cv()
    {
        return $this->hasOne(Cv::class);
    }

    public function evaluation_recipient()
    {
        return $this->morphMany(Evaluation::class , 'evaluationable');
    }

    public function evaluations_sender()
    {
        return $this->hasMany(Evaluation::class);
    }

    //Projects

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    //Wallet

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    //Tasks

    public function tasks()
    {
        return $this->belongsToMany(Task::class , 'user_tasks');
    }

    //Deliveries

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    //Comments

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
