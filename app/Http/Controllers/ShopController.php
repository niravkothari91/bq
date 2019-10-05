<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Productcategory;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categories = Category::all();
        $products = null;
        $subcategory = null;
        $productCategories = null;
        $categoryName = '';
        if(request()->subcategory) {
            $subcategory = Subcategory::bySlug(request()->subcategory)->first();
            if($subcategory) {
                $productCategories = Productcategory::ByParentId($subcategory->id)->get();
                $products = Product::with('prodCategories')->whereHas('prodCategories', function($query) use ($productCategories) {
                    $query->whereIn('productcategory_id', $productCategories->pluck('id'));
                });
                $categoryName = $subcategory->name;
            } else {
                return Redirect::to("/");
            }
        } else if(request()->productcategory) {
            $productCategory = Productcategory::bySlug(request()->productcategory)->first();
            if($productCategory) {
                $products = Product::with('prodCategories')->whereHas('prodCategories', function($query) use ($productCategory) {
                    $query->where('productcategory_id', $productCategory->id);
                });
                $categoryName = $productCategory->name;

                $subcategory = Subcategory::find($productCategory->parent_id);
                if($subcategory) {
                    $productCategories = Productcategory::ByParentId($subcategory->id)->get();
                }
            } else {
                return Redirect::to("/");
            }
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->simplePaginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->simplePaginate($pagination);
        } else {
            $products = $products->simplePaginate($pagination);
        }

        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'subcategory' => $subcategory,
            'productCategories' => $productCategories,
            'categoryName' => $categoryName,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

        $stockLevel = getStockLevel($product->quantity);

        return view('product')->with([
            'product' => $product,
            'stockLevel' => $stockLevel,
            'mightAlsoLike' => $mightAlsoLike,
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        // $products = Product::where('name', 'like', "%$query%")
        //                    ->orWhere('details', 'like', "%$query%")
        //                    ->orWhere('description', 'like', "%$query%")
        //                    ->paginate(10);

        $products = Product::search($query)->paginate(12);

        return view('search-results')->with('products', $products);
    }

    public function searchAlgolia(Request $request)
    {
        return view('search-results-algolia');
    }
}
