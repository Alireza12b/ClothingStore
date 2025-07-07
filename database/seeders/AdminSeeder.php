<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Alireza Bagheri',
            'email' => 'alirezabagheri12b@gmail.com',
            'password' => Hash::make('Aa12345678'),
            'role' => 'admin',
        ]);
    }
}
