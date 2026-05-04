<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CvContent extends Model
{
    use HasUuids;

    protected $fillable = [
        'cv_id',
        'type',
        'value',
        'extensions',
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
