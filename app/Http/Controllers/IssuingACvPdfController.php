<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class IssuingACvPdfController extends Controller
{
    public function issuingACvPdf(Request $request)
    {
        $cvContent = $request->user()->cv->cvContents;
        $information = $request->user()->information;
        $userName = $request->user()->name;
        $pdf = Pdf::loadView('IssuingPdf.cv-view', [
            'cvContent' => $cvContent,
            'information' => $information,
            'userName' => $userName,
        ]);

        return $pdf->stream($userName.'_Cv_'. now()->format('Y') . '.pdf');
    }
}
