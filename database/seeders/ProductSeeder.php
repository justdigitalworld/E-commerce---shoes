<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categories
        $men = \App\Models\Category::create(['name' => 'Men', 'slug' => 'men', 'image' => 'cat-men.jpg']);
        $women = \App\Models\Category::create(['name' => 'Women', 'slug' => 'women', 'image' => 'cat-women.jpg']);
        $kids = \App\Models\Category::create(['name' => 'Kids', 'slug' => 'kids', 'image' => 'cat-kids.jpg']);

        // Brands
        $nike = \App\Models\Brand::create(['name' => 'Nike', 'slug' => 'nike', 'logo' => 'nike.png']);
        $adidas = \App\Models\Brand::create(['name' => 'Adidas', 'slug' => 'adidas', 'logo' => 'adidas.png']);
        $puma = \App\Models\Brand::create(['name' => 'Puma', 'slug' => 'puma', 'logo' => 'puma.png']);

        // Products
        \App\Models\Product::create([
            'brand_id' => $nike->id,
            'category_id' => $men->id,
            'name' => 'Nike Air Max',
            'slug' => 'nike-air-max',
            'description' => 'Comfortable running shoes.',
            'price' => 120.00,
            'stock' => 50,
            'sku' => 'NK-AM-001',
            'sizes' => ['8', '9', '10', '11'],
            'colors' => ['Red', 'Black', 'White'],
        ]);

        \App\Models\Product::create([
            'brand_id' => $adidas->id,
            'category_id' => $women->id,
            'name' => 'Adidas Ultraboost',
            'slug' => 'adidas-ultraboost',
            'description' => 'High performance shoes.',
            'price' => 140.00,
            'stock' => 30,
            'sku' => 'AD-UB-001',
            'sizes' => ['6', '7', '8'],
            'colors' => ['Pink', 'White'],
        ]);
        
        \App\Models\Product::create([
            'brand_id' => $puma->id,
            'category_id' => $men->id,
            'name' => 'Puma RS-X',
            'slug' => 'puma-rs-x',
            'description' => 'Stylish sneakers.',
            'price' => 110.00,
            'stock' => 20,
            'sku' => 'PM-RS-001',
            'sizes' => ['9', '10', '11'],
            'colors' => ['Blue', 'Multi'],
        ]);
    }
}
