<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(15);
        
        return view('admin.products.index', compact('products'));
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }
    
    public function store(ProductRequest $request)
    {
		if ($files = $request->file('image')) {
			$path = '/img/cover/';
			$img = '/img/cover/' . $files->getClientOriginalName();
			$files->move($path, $img);
			$request->image = $img;
		}
        Product::create($request->all());
        
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
    
    public function update(ProductRequest $request, Product $product)
    {		
		if ($files = $request->file('image')) {
			$path = '/img/cover/';
			$img = '/img/cover/' . $files->getClientOriginalName();
			$files->move($path, $img);
			$product->image = $img;
		}
        
        $product->title = $request->title;
        $product->description = $request->description;
        $product->save();
        
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }
    
    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }
    

}
