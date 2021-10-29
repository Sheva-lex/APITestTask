<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\UploadImageService;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::get();
        return view('admin.products.new_edit', compact('categories'));
    }


    public function store(ProductRequest $request, UploadImageService $imageService)
    {
        $validated = $request->validated();
        if ($request->image) {
            $folder = 'product';
            $path = $imageService->uploadImage($request->image, $folder);
            $validated['image'] = $path;
        }
        Product::create($validated);
        return redirect()->route('admin.products.index')->with('success', "Продукт \"{$request->name}\" успішно створено");
    }


    public function show($id)
    {
        //
    }


    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('admin.products.new_edit', compact('product', 'categories'));
    }


    public function update(ProductRequest $request, Product $product, UploadImageService $imageService)
    {
        $validated = $request->validated();
        if ($request->image) {
            $folder = 'products/'.$product->id;
            $path = $imageService->updateImage($request->image, $folder, $product->image ?: null);
            $validated['image'] = $path;
        }
        $product->update($validated);
        return redirect()->route('admin.products.index')->with('success', "Продукт \"{$product->name}\" успішно оновлено");
    }


    public function destroy(Product $product, UploadImageService $imageService)
    {
        $imageService->deleteImage($product->image);
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
