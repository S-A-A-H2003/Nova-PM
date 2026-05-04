<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'photo',
        'email',
        'date_pirth',
        'gender',
        'address',
        'occupation',
        'link_one',
        'link_two',
        'link_three',
        'link_one_as',
        'link_two_as',
        'link_three_as',
    ];

    protected function casts()
    {
        return [
            "date_pirth" => "date"
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
