<?php

namespace App\Filters;

use App\Http\Requests\ProductFilterRequest;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{
    public function __construct(ProductFilterRequest $request)
    {
        parent::__construct($request);
    }

    public function categoryId(?string $ids = null): ?Builder
    {
        return $this->builder->when(
            $ids,
            function ($query) use ($ids) {
                $query->whereIn('category_id', $this->paramToArray($ids));
            }
        );
    }

    public function search(string $searchString = null): ?Builder
    {
        return $this->builder->when(
            $searchString,
            function ($query) use ($searchString) {
                $query->where(function ($query) use ($searchString) {
                    $query->where('name', 'LIKE', '%' . $searchString . '%')
                        ->orWhere('description', 'LIKE', '%' . $searchString . '%');
                });
            }
        );
    }
}
