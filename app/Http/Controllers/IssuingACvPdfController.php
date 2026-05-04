<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssuingACvPdfController extends Controller
{
    public function issuingACvPdf()
    {
        // view => issuing-a-cv-pdf.blade.php
        return back()->with('error' , 'not finish yet 😒');
    }
}
