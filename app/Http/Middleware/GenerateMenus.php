<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;
use Lavary\Menu\Menu;

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
            $navbar = new Menu();
            $navbar->make('MyNavBar', function ($menu) use ($parentCategories) {
                foreach($parentCategories as $category_item) {
                    $menu->add($category_item->name, ['url' => $category_item->slug, 'class' => 'nav navbar-nav']);
                }
            });
        } else {
            dd("Menu Items not found. Please make sure the seeders ran properly");
        }
        return $next($request);
    }
}
