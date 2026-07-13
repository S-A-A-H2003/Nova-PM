<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class IssuingACertificateOfTrainingController extends Controller
{
    public function issuingACertificateOfTraining(Request $request)
    {
        $pdf = Pdf::loadView('IssuingPdf.certificate-of-training-view' , ['name' => $request->user()->name]);
        return $pdf->download('certificate of training completed for ' . $request->user()->name . '.pdf');
    }

    public function showACertificateOfTraining(Request $request)
    {
        $pdf = Pdf::loadView('IssuingPdf.certificate-of-training-view' , ['name' => $request->user()->name]);
        return $pdf->stream('certificate of training completed for ' . $request->user()->name . '.pdf');
    }
}
