<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index(ProductFilter $filter): AnonymousResourceCollection
    {
        $perPage = $filter->request->input('perPage') ?: 5;
        $sortField = $filter->request->input('sortField') ?: 'created_at';
        $sortDirection = $filter->request->input('sortDirection') ?: 'desc';
        return ProductResource::collection(
            Product::filter($filter)
                ->orderBy($sortField, $sortDirection)
                ->paginate($perPage)
        );
    }

    public function store(ProductRequest $request): object
    {
        return Product::create($request->validated());
    }

    public function show(Product $product): object
    {
        return new ProductResource($product);
    }

    public function update(ProductRequest $request, Product $product): object
    {
        $product->update($request->validated());
        return new ProductResource($product);
    }

    public function destroy(Product $product): Response
    {
        $product->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
