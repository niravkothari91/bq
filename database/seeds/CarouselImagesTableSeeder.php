<?php

use App\CarouselImages;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarouselImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        CarouselImages::insert([
            ['url' => 'carousel-1.jpg', 'page_link' => '/shop','order' => '1', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['url' => 'carousel-2.jpg', 'page_link' => '/shop', 'order' => '2', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['url' => 'carousel-3.jpg', 'page_link' => '/shop', 'order' => '3', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
