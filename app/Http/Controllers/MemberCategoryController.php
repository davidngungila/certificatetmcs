<?php

namespace App\Http\Controllers;

use App\Models\MemberCategory;
use Illuminate\Http\Request;

class MemberCategoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:20',
            'description' => 'nullable|string'
        ]);

        MemberCategory::create($validated);
        return redirect()->back()->with('success', 'Category created successfully!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:20',
            'description' => 'nullable|string'
        ]);

        $category = MemberCategory::findOrFail($id);
        $category->update($validated);
        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        MemberCategory::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
