<?php

namespace App\Services;

class Utilities {

    public function descriptionClean($value)
    {
        $allowed_tags = [
            'h1','h2','h3','h4','h5','h6','p','br',
            'ul','ol','li',
            'table','thead','tbody','tr','th','td',
            'a','img',
            'strong','b','em','i','u','strike','del','sub','sup',
            'blockquote','pre','code'
        ];

        $allowed = '';
        foreach($allowed_tags as $tag){
            $allowed .= "<$tag>";
        }

        $description = strip_tags($value, $allowed);

        return $description;
    }
}
