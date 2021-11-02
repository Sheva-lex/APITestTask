<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\UploadImageService;
use Illuminate\View\View;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\Foundation\Application;
use \Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{

    public function index(): Application|Factory|View
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(): Application|Factory|View
    {
        return view('admin.categories.new_edit');
    }

    public function store(CategoryRequest $request, UploadImageService $imageService): RedirectResponse
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $folder = 'category';
            $path = $imageService->uploadImage($request->file('image'), $folder);
            $validated['image'] = $path;
        }
        Category::create($validated);
        return redirect()->route('admin.categories.index')
            ->with('success', "Категорію \"{$request->name}\" успішно створено");
    }

    public function edit(Category $category): Application|Factory|View
    {
        return view('admin.categories.new_edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category, UploadImageService $imageService): RedirectResponse
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $folder = 'categories/' . $category->id;
            $path = $imageService->updateImage($request->file('image'), $folder, $category->image ?: null);
            $validated['image'] = $path;
        }
        $category->update($validated);
        return redirect()->route('admin.categories.index')
            ->with('success', "Категорію \"{$category->name}\" успішно оновлено");
    }

    public function destroy(Category $category, UploadImageService $imageService): RedirectResponse
    {
        $imageService->deleteImage($category->image);
        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', "Категорію \"{$category->name}\" успішно видалено");
    }
}
