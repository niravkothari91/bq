<?php

use App\Productcategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Productcategory::insert([
            ['parent_id' => 1,'name' => 'Bartending Sets', 'slug' => 'bartending-sets', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Bar Tote Bar Sets', 'slug' => 'bar-tote-bar-sets', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Flair Bartending / Training Bar Kits', 'slug' => 'flair-bartending-training-bar-kits', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Home Bar & Gift Packages', 'slug' => 'home-bar-gift-packages', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 2,'name' => 'V-Rod Bottle Openers', 'slug' => 'v-rod-bottle-openers', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 2,'name' => 'Speed Openers', 'slug' => 'speed-openers', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 2,'name' => 'Dog Bone Openers', 'slug' => 'dog-bone-openers', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 2,'name' => 'Mini Openers', 'slug' => 'mini-openers', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 5,'name' => 'Shaker Tins', 'slug' => 'shaker-tins', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 5,'name' => '2 Piece Shaker Sets', 'slug' => '2-piece-shaker-sets', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 5,'name' => '3 Piece Cocktail Shakers', 'slug' => '3-piece-cocktail-shakers', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 5,'name' => 'Printed Cocktail Shakers', 'slug' => 'printed-cocktail-shakers', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 5,'name' => 'Mixing Glasses', 'slug' => 'mixing-glasses', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
