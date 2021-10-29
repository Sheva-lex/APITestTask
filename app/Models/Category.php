<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'is_active',
        'priority',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->latest();
    }

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('name', '%' . $val . '%');
    }
}
