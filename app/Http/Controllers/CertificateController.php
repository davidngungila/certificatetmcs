<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function generatePdf(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'date' => 'required|date',
        ]);

        $pdf = Pdf::loadView('certificates.pdf-template', [
            'name' => $validated['name'],
            'type' => $validated['type'],
            'date' => $validated['date'],
        ]);

        return $pdf->download('certificate-' . strtolower(str_replace(' ', '-', $validated['name'])) . '.pdf');
    }
}
