<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'لباس‌های مردانه']);
        Category::create(['name' => 'لباس‌های زنانه']);
        Category::create(['name' => 'لباس‌های بچه‌گانه']);
        Category::create(['name' => 'کفش و کتانی']);
    }
}
