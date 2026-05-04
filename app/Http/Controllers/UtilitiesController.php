<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class UtilitiesController extends Controller
{
    public function viewFile($model , $id , $field , $isJson = false , $otherField = null , $isPrivate = true)
    {
        $file = $model::findOrFail($id);
        if($isJson == "1"){
            $file = json_decode($file->$field)->$otherField;
        }else {
            $file = $file->$field;
        }

        if ($isPrivate == "1") {
            $path = Storage::path($file); 
            return response()->file($path);
        }else{
            $path = Storage::url($file);
            return response()->file(public_path($path));
        }
    }
}
