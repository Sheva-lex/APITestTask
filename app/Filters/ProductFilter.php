<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{
    public function categoryId(?int $id = null): ?Builder
    {
        return $this->builder->when(
            $id,
            function ($query) use ($id) {
                $query->where('category_id', $id);
            }
        );
    }

    public function search(string $searchString = null): ?Builder
    {
        return $this->builder->when(
            $searchString,
            function ($query) use ($searchString) {
                $query->where('name', 'LIKE', '%' . $searchString . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchString . '%');
            }
        );
    }
}
