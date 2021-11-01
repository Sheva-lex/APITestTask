<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::all());
    }

    public function store(CategoryRequest $request): object
    {
        $category = Category::create($request->validated());
        return new CategoryResource($category);
    }

    public function show(Category $category): object
    {
        return new CategoryResource($category);
    }

    public function update(CategoryRequest $request, Category $category): object
    {
        $category->update($request->validated());
        return new CategoryResource($category);
    }

    public function destroy(Category $category): Response
    {
        $category->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
