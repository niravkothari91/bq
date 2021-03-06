<?php

namespace App\Http\Middleware;

use App\Category;
use App\Subcategory;
use Closure;


class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $parentCategories = Category::all();
        if($parentCategories != null && $parentCategories->count() > 0) {
            \Menu::make('MyNavBar', function ($menu) use ($parentCategories) {
                foreach($parentCategories as $category_item) {
                    $parent = $menu->add($category_item->name, ['url' => '#']);
                    $subcategories = Subcategory::byParentId($category_item->id)->get();
                    foreach($subcategories as $subcategory) {
                        $subcatItem = $parent->add($subcategory->name, ['url' => route('shop.index', ['subcategory' => $subcategory->slug])]);
                        /*$prodCategories = Productcategory::byParentId($subcategory->id)->get();
                        foreach($prodCategories as $prodCategory) {
                            $subcatItem->add($prodCategory->name, ['url' => '#']);
                        }*/
                    }
                }
            });
        } else {
            dd("Menu Items not found. Please make sure the seeders ran properly");
        }
        return $next($request);
    }
}
