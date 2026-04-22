<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = $request->user()
            ->categories()
            ->withCount('notes')
            ->orderBy('name')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:80',
        ]);

        $request->user()->categories()->create($validated);

        return redirect()
            ->route('categories.index')
            ->with('status', 'Category created.');
    }

    public function update(Request $request, Category $category)
    {
        $this->authorizeCategory($request, $category);

        $category->update(
            $request->validate([
                'name' => 'required|string|max:80',
            ])
        );

        return back()->with('status', 'Category updated.');
    }

    public function destroy(Request $request, Category $category)
    {
        $this->authorizeCategory($request, $category);

        $category->delete();

        return back()->with('status', 'Category deleted.');
    }

    /**
     * Centralized ownership check (cleaner than repeating abort_unless)
     */
    private function authorizeCategory(Request $request, Category $category): void
    {
        abort_unless(
            $category->user_id === $request->user()->id,
            403
        );
    }
}