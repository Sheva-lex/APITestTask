<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'image',
        'price',
        'is_top',
        'is_active',
        'priority',
    ];

    protected $casts = [
        'created_at' => 'datetime:d.m.Y h:i:s',
        'updated_at' => 'datetime:d.m.Y h:i:s',
    ];

    public function category(): object
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter): object
    {
        return $filter->apply($builder);
    }
}
