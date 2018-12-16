<?php

use App\Subcategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Subcategory::insert([
            ['parent_id' => 1,'name' => 'Bar Sets & Package Specials', 'slug' => 'bar-sets-package-specials', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Bartending Bottle Openers', 'slug' => 'bartending-bottle-openers', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Cork Screws and Wine Openers', 'slug' => 'cork-screws-wine-openers', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Bottle Opener Accessories', 'slug' => 'bottle-opener-accessories', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Cocktail Shakers', 'slug' => 'cocktail-shakers', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Bar Spoons', 'slug' => 'bar-spoons', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Muddlers', 'slug' => 'muddlers', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Cocktail Strainers', 'slug' => 'cocktail-strainers', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Jiggers & Inventory Control', 'slug' => 'jiggers-inventory-controls', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Citrus Tools', 'slug' => 'citrus-tools', 'created_at' => $now, 'updated_at' => $now],
            ['parent_id' => 1,'name' => 'Ice Tools & Supplies', 'slug' => 'ice-tools-supplies', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
