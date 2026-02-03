<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id', 'category_id', 'name', 'slug', 'description', 
        'price', 'discount_price', 'stock', 'sku', 'sizes', 'colors', 'is_active', 'priority'
    ];

    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
        'is_active' => 'boolean',
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }
}
