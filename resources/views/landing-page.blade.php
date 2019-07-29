@extends('layout')
@section('content')
        <div id="app">
            <div class="home-page-carousel">
                @foreach($carouselImages as $image)
                    <a href="{{$image->page_link}}"><img src="{{asset('img/'.$image->url)}}"/></a>
                @endforeach
            </div>
            <div class="featured-section">

                <div class="container">
                    <h1 class="text-center">BarQualified</h1>

                    <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.</p>

                    <div class="text-center button-container">
                        <a href="#" class="button">Featured</a>
                        <a href="#" class="button">On Sale</a>
                    </div>

                    {{-- <div class="tabs">
                        <div class="tab">
                            Featured
                        </div>
                        <div class="tab">
                            On Sale
                        </div>
                    </div> --}}

                    <div class="products text-center">
                        @foreach ($products as $product)
                            <div class="product">
                                <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product"></a>
                                <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                                <div class="product-price">{{ $product->presentPrice() }}</div>
                            </div>
                        @endforeach

                    </div> <!-- end products -->

                    <div class="text-center button-container">
                        <a href="{{ route('shop.index') }}" class="button">View more products</a>
                    </div>

                </div> <!-- end container -->

            </div> <!-- end featured-section -->

        </div> <!-- end #app -->

    @section('extra-js')
    <script src="js/app.js"></script>
    <script src="js/main.js"></script>

    <!-- Slick JS for Carousel -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.home-page-carousel').slick({
                dots: true,
                arrows: false,
                autoplay: true,
                pauseOnHover: true,
                pauseOnFocus: true
            });
        });
    </script>
    @endsection
@endsection
