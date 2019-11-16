<?php

namespace App\Http\Controllers;

use App\CarouselImages;
use App\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('featured', true)->take(16)->inRandomOrder()->get();
        $carouselImages = CarouselImages::where('is_active', true)->orderBy('order')->get();
        return view('landing-page')->with(['products' => $products, 'carouselImages' => $carouselImages]);
    }
}
