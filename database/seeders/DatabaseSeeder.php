<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategorySeeder::class,
        ]);
        $this->call([
            ColorSeeder::class,
        ]);
        $this->call([
            SizeSeeder::class,
        ]);
        $this->call([
            ProductSeeder::class,
        ]);
        $this->call([
            ProductVariantSeeder::class,
        ]);
        $this->call(AdminSeeder::class);
    }
}
