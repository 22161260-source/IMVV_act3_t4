<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'tags'])->latest()->paginate(8);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('products.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $product = Product::create($data);
        $product->tags()->sync($request->input('tags', []));

        return redirect()->route('productos.index')->with('status', 'Producto creado correctamente.');
    }

    public function show(Product $producto)
    {
        $producto->load(['category.products', 'tags']);
        $product = $producto;

        return view('products.show', compact('product'));
    }

    public function edit(Product $producto)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = $producto->tags->pluck('id')->toArray();
        $product = $producto;

        return view('products.edit', compact('product', 'categories', 'tags', 'selectedTags'));
    }

    public function update(Request $request, Product $producto)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $producto->update($data);
        $producto->tags()->sync($request->input('tags', []));

        return redirect()->route('productos.show', $producto)->with('status', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('status', 'Producto eliminado correctamente.');
    }
}
