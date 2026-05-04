<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasSearch {

    public function scopeSearch(Builder $builder , $key , $value)
    {
        $builder->where($key , "like" , "%{$value}%");
    }
}
