<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Bar Tools', 'slug' => 'bar-tools', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bar Supplies', 'slug' => 'bar-supplies', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bar Equipment', 'slug' => 'bar-equipment', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Beer & Wine', 'slug' => 'beer-wine', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kitchen, Dinning & Service', 'slug' => 'kitchen-dinning-service', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Home Bar & Gifts', 'slug' => 'home-bar-gifts', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
