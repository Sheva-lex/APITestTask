<?php

namespace App\Models;

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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('name', '%' . $val . '%');
    }

    public function scopeSearchByCategory($query, $val)
    {
        if ($val == '') {
            return $query
                ->where('category_id', 'like', '%' . $val . '%')
                ->orWhere('category_id', null);
        }
        return $query
            ->where('category_id', 'like', '%' . $val . '%');
    }

}
