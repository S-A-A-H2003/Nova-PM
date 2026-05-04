<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssuingACertificateOfTrainingController extends Controller
{
    public function issuingACertificateOfTraining()
    {
        return back()->with('error' , 'not finish yet 😒');
    }

    public function showACertificateOfTraining()
    {
        return back()->with('error' , 'not finish yet 😒');
    }
}
