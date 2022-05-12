<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(15);
        
        return view('admin.categories.index', compact('categories'));
    }
    
    public function create()
    {
        return view('admin.categories.create');
    }
    
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);
    
        Category::create($request->all());
        
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }
    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);
    
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        
        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }
    
    public function destroy(Category $category)
    {
        $category->delete();
        
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
