<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'لباس مردانه']);
        Category::create(['name' => 'لباس زنانه']);
        Category::create(['name' => 'لباس بچه‌گانه']);
        Category::create(['name' => 'کفش و کتانی']);
    }
}
