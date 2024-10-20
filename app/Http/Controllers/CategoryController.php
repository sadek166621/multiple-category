<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        // Fetch parent categories with their subcategories and sub-subcategories
        $categories = Category::whereNull('parent_id')->with('children.children.children')->get();
        return view('categories.index', compact('categories'));
    }

    // Show form to create a new category
    public function create()
    {
        // Get all parent categories to display in the dropdown
        $categories = Category::whereNull('parent_id')->get();
        return view('categories.create', compact('categories'));
    }

    // Store the newly created category
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        // Create the category
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        // Redirect to the category index with a success message
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
}
