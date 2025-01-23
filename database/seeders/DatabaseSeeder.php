<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CreateUserSeeder::class);
        Product::factory(20)->create();
    }
}
