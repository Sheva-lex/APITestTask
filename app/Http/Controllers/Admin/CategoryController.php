<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\UploadImageService;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.new_edit');
    }


    public function store(CategoryRequest $request, UploadImageService $imageService)
    {
        $validated = $request->validated();
        if ($request->image) {
            $folder = 'category';
            $path = $imageService->uploadImage($request->image, $folder);
            $validated['image'] = $path;
        }
        Category::create($validated);
        return redirect()->route('admin.categories.index')
            ->with('success', "Категорію \"{$request->name}\" успішно створено");
    }


    public function show($id)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('admin.categories.new_edit', compact('category'));
    }


    public function update(CategoryRequest $request, Category $category, UploadImageService $imageService)
    {
        $validated = $request->validated();
        if ($request->image) {
            $folder = 'categories/' . $category->id;
            $path = $imageService->updateImage($request->image, $folder, $category->image ?: null);
            $validated['image'] = $path;
        }
        $category->update($validated);
        return redirect()->route('admin.categories.index')
            ->with('success', "Категорію \"{$category->name}\" успішно оновлено");
    }


    public function destroy(Category $category, UploadImageService $imageService)
    {
        $imageService->deleteImage($category->image);
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
