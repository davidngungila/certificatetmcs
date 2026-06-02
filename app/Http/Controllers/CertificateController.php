<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Member;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::with('member')->latest()->paginate(10);
        $members = Member::all();
        return view('certificates.index', compact('certificates', 'members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'nullable|exists:members,id',
            'member_name' => 'required|string|max:255',
            'certificate_type' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:issue_date'
        ]);
        
        $certificate = Certificate::create([
            ...$validated,
            'certificate_number' => 'CERT-'.Str::upper(Str::random(8))
        ]);
        
        return redirect()->back()->with('success', 'Certificate created!');
    }

    public function update(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $validated = $request->validate([
            'member_id' => 'nullable|exists:members,id',
            'member_name' => 'required|string|max:255',
            'certificate_type' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:issue_date',
            'status' => 'required|in:issued,revoked,expired'
        ]);
        
        $certificate->update($validated);
        
        return redirect()->back()->with('success', 'Certificate updated!');
    }

    public function destroy($id)
    {
        Certificate::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Certificate deleted!');
    }

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
        ])->setPaper('a4', 'landscape');

        return $pdf->download('certificate-' . strtolower(str_replace(' ', '-', $validated['name'])) . '.pdf');
    }

    public function show($id)
    {
        $certificate = Certificate::findOrFail($id);
        
        $pdf = Pdf::loadView('certificates.pdf-template', [
            'name' => $certificate->member_name,
            'type' => $certificate->certificate_type,
            'date' => $certificate->issue_date->format('Y-m-d')
        ])->setPaper('a4', 'landscape');
        
        return $pdf->stream('certificate-' . $certificate->certificate_number . '.pdf');
    }
}
