<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Brand::factory(100)->create();
        \App\Models\Category::factory(100)->create();
        \App\Models\Tag::factory(100)->create();
        \App\Models\Product::factory(100)->create();
        \App\Models\Review::factory(100)->create();
        \App\Models\Transaction::factory(100)->create();
        \App\Models\Order::factory(100)->create();
    }
}
