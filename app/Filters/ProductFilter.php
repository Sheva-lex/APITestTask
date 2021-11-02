<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{
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
