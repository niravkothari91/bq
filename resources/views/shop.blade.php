@extends('layout')

@section('title', 'Products')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

    @component('components.breadcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shop</span>
    @endcomponent

    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="products-section container">
            <div class="sidebar">
                @if($subcategory && $subcategory->productCategories && count($subcategory->productCategories) > 0)
                <h3>By Category</h3>
                <ul>
                    @foreach ($subcategory->productCategories as $productCategory)
                        <li class="{{ setActiveCategory($productCategory->slug) }}"><a href="{{ route('shop.index', ['productcategory' => $productCategory->slug]) }}">{{ $productCategory->name }}</a></li>
                    @endforeach
                </ul>
                {{--<div id="accordion" style="width:90%">
                    @foreach($categories as $category)
                        <h3>{{$category->name}}</h3>
                        <div>
                            @if($category->subcategories && count($category->subcategories) > 0)
                                @foreach($category->subcategories as $subcategory)
                                    <p><a href="{{ route('shop.index', ['category' => $subcategory->slug]) }}">{{ $subcategory->name }}</a></p>
                                @endforeach
                            @endif
                        </div>


                    @endforeach
                </div>--}}
                @endif
            </div> <!-- end sidebar -->
        <div>
            <div class="products-header">
                <h1 class="stylish-heading">{{ $categoryName }}</h1>
                <div>
                    <strong>Price: </strong>
                    @if(request()->subcategory)
                        <a href="{{ route('shop.index', ['subcategory'=> request()->subcategory, 'sort' => 'low_high']) }}">Low to High</a> |
                        <a href="{{ route('shop.index', ['subcategory'=> request()->subcategory, 'sort' => 'high_low']) }}">High to Low</a>
                    @elseif(request()->productcategory)
                        <a href="{{ route('shop.index', ['productcategory'=> request()->productcategory, 'sort' => 'low_high']) }}">Low to High</a> |
                        <a href="{{ route('shop.index', ['productcategory'=> request()->productcategory, 'sort' => 'high_low']) }}">High to Low</a>
                    @else
                        <a href="{{ route('shop.index', ['sort' => 'low_high']) }}">Low to High</a> |
                        <a href="{{ route('shop.index', ['sort' => 'high_low']) }}">High to Low</a>
                    @endif


                </div>
            </div>

            <div class="products text-center">
                @forelse ($products as $product)
                    <div class="product">
                        <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" width="90%" alt="product"></a>
                        <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                        <div class="product-price">{{ $product->presentPrice() }}</div>
                    </div>
                @empty
                    <div style="text-align: left">No items found</div>
                @endforelse
            </div> <!-- end products -->

            <div class="spacer"></div>
            {{ $products->appends(request()->input())->links() }}
        </div>
    </div>

@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    {{--<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>--}}
@endsection
