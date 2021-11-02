<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'is_active',
        'priority',
    ];

    protected $casts = [
        'created_at' => 'datetime:d.m.Y h:i:s',
        'updated_at' => 'datetime:d.m.Y h:i:s',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->latest();
    }
}
