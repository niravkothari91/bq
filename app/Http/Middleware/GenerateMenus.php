<?php

namespace App\Http\Middleware;

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
        if(!Menu::exists('MyNavBar')) {
            Menu::make('MyNavBar', function ($menu) {
                $menu->add('Bar Tools')
                ->add('Bar Sets & Package Specials')
                ->add('Bartending Bottle Openers')
                ->add()
                ->add()
                ->add()
                ->add()
                ->add()
                ->add();
                $menu->add('Bar Supplies', 'about');
                $menu->add('Bar Equipment', 'services');
            });
        }
        return $next($request);
    }
}
