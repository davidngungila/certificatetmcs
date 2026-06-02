<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();
        
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        if ($request->filled('university')) {
            $query->where('university', $request->university);
        }
        
        $members = $query->orderBy('created_at', 'desc')->paginate(10);
        
        $categories = ['Student Member', 'Leadership', 'Alumni', 'Spiritual Coordinator'];
        $universities = ['UDSM', 'SUA', 'MUCE', 'IFM', 'UDOM', 'Other'];
        
        return view('members.index', compact('members', 'categories', 'universities'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:members',
            'student_id' => 'nullable|string|max:50',
            'university' => 'nullable|string|max:100',
            'category' => 'required|string|max:50',
            'joined_at' => 'nullable|date'
        ]);
        
        Member::create($validated);
        
        return redirect()->route('members.index')->with('success', 'Member added successfully');
    }
    
    public function bulkImport(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls,csv|max:5120'
        ]);
        
        try {
            $data = Excel::toArray([], $request->file('excel_file'));
            
            if (!empty($data[0])) {
                foreach ($data[0] as $row) {
                    if (count($row) < 2) continue;
                    
                    $name = $row[0] ?? '';
                    if (empty($name)) continue;
                    
                    Member::create([
                        'name' => $name,
                        'email' => $row[1] ?? null,
                        'student_id' => $row[2] ?? null,
                        'university' => $row[3] ?? null,
                        'category' => $row[4] ?? 'Student Member',
                        'joined_at' => !empty($row[5]) ? $row[5] : now(),
                    ]);
                }
            }
            
            return redirect()->route('members.index')->with('success', 'Members imported successfully');
        } catch (\Exception $e) {
            return redirect()->route('members.index')->with('error', 'Import failed: '.$e->getMessage());
        }
    }
}
