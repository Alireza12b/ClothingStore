<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductVariant::create([
            'product_id' => '1', 
            'color_id' => '1',
            'size_id' => '3',
            'price' => '100000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '1', 
            'color_id' => '2',
            'size_id' => '3',
            'price' => '200000',
            'quantity' => '8',
        ]);
        ProductVariant::create([
            'product_id' => '1', 
            'color_id' => '3',
            'size_id' => '4',
            'price' => '300000',
            'quantity' => '7',
        ]);
        ProductVariant::create([
            'product_id' => '1', 
            'color_id' => '4',
            'size_id' => '3',
            'price' => '300000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '1', 
            'color_id' => '5',
            'size_id' => '2',
            'price' => '300000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '1', 
            'color_id' => '6',
            'size_id' => '6',
            'price' => '300000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '2', 
            'color_id' => '1',
            'size_id' => '3',
            'price' => '140000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '2', 
            'color_id' => '3',
            'size_id' => '3',
            'price' => '600000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '3', 
            'color_id' => '5',
            'size_id' => '3',
            'price' => '900000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '3', 
            'color_id' => '5',
            'size_id' => '3',
            'price' => '200000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '4', 
            'color_id' => '4',
            'size_id' => '3',
            'price' => '500000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '4', 
            'color_id' => '6',
            'size_id' => '2',
            'price' => '100000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '5', 
            'color_id' => '6',
            'size_id' => '1',
            'price' => '100000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '5', 
            'color_id' => '6',
            'size_id' => '1',
            'price' => '100000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '6', 
            'color_id' => '6',
            'size_id' => '1',
            'price' => '100000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '6', 
            'color_id' => '6',
            'size_id' => '1',
            'price' => '100000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '7', 
            'color_id' => '1',
            'size_id' => '35',
            'price' => '2000000',
            'quantity' => '7',
        ]);
        ProductVariant::create([
            'product_id' => '7', 
            'color_id' => '1',
            'size_id' => '30',
            'price' => '5000000',
            'quantity' => '4',
        ]);
        ProductVariant::create([
            'product_id' => '8', 
            'color_id' => '4',
            'size_id' => '27',
            'price' => '1000000',
            'quantity' => '2',
        ]);
        ProductVariant::create([
            'product_id' => '8', 
            'color_id' => '6',
            'size_id' => '37',
            'price' => '1000000',
            'quantity' => '6',
        ]);
    }
}
