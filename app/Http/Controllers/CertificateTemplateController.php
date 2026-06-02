<?php

namespace App\Http\Controllers;

use App\Models\CertificateTemplate;
use Illuminate\Http\Request;

class CertificateTemplateController extends Controller
{
    public function index()
    {
        $templates = CertificateTemplate::latest()->paginate(10);
        return view('templates.index', compact('templates'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);
        
        CertificateTemplate::create($validated);
        
        return redirect()->back()->with('success', 'Template created!');
    }

    public function show($id)
    {
        $template = CertificateTemplate::findOrFail($id);
        
        // Show preview with sample data
        return view('templates.preview', compact('template'));
    }

    public function edit($id)
    {
        $template = CertificateTemplate::findOrFail($id);
        // Redirect to designer
        return redirect()->route('templates.designer')->with('template_id', $id);
    }

    public function update(Request $request, $id)
    {
        $template = CertificateTemplate::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'design_data' => 'nullable|array',
            'status' => 'required|in:active,inactive'
        ]);
        
        $template->update($validated);
        
        return redirect()->back()->with('success', 'Template updated!');
    }

    public function destroy($id)
    {
        CertificateTemplate::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Template deleted!');
    }
}
