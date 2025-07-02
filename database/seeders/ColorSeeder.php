<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create([
            'name' => 'مشکی',
            'hex_code' => '000000'
        ]);
        Color::create([
            'name' => 'سفید',
            'hex_code' => 'ffffff'
        ]);
        Color::create([
            'name' => 'زرد',
            'hex_code' => 'f7eb02'
        ]);
        Color::create([
            'name' => 'سبز',
            'hex_code' => '039e1a'
        ]);
        Color::create([
            'name' => 'آبی',
            'hex_code' => '005acf'
        ]);
        Color::create([
            'name' => 'قرمز',
            'hex_code' => 'cf000e'
        ]);
    }
}
