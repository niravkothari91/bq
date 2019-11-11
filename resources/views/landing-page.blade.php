@extends('layout')
@section('content')
        <div id="app">
            <div class="home-page-carousel">
                @foreach($carouselImages as $image)
                    <a href="{{$image->page_link}}"><img class="carousel-images" src="{{asset('img/'.$image->url)}}"/></a>
                @endforeach
            </div>
            <div class="featured-section">

                <div class="container">

                    <div class="features-description">
                        <div class="features-logo-container center-contents"><img class="features-logo-image" src="{{asset('img/bq_logo.png')}}"></div>
                        <div>
                            <div class="feature-container">
                                <div class="center-contents">
                                    <div class="feature-icon-container center-contents">
                                        <i class="fa fa-3x fa-usd"></i>
                                    </div>
                                </div>
                                <div>
                                    <h3>Low Price Guarantee</h3>
                                    <p>If you find one of our products on the internet for less, call us and we'll beat their price by 5%.</p>
                                </div>
                            </div>
                            <div class="feature-container">
                                <div class="center-contents">
                                    <div class="feature-icon-container center-contents">
                                        <i class="fa fa-3x fa-smile-o"></i>
                                    </div>
                                </div>
                                <div>
                                    <h3>Satisfaction Guarantee</h3>
                                    <p>Satisfaction Guaranteed on all of our products returned in original condition within 30 days for a refund or exchange.</p>
                                </div>
                            </div>
                            <div class="feature-container">
                                <div class="center-contents">
                                    <div class="feature-icon-container center-contents">
                                        <i class="fa fa-3x fa-star"></i>
                                    </div>
                                </div>
                                <div>
                                    <h3>Outstanding Service</h3>
                                    <p>We're here to help! We offer a top-notch friendly customer service team to all our customers.</p>
                                </div>
                            </div>
                            <div class="feature-container">
                                <div class="center-contents">
                                    <div class="feature-icon-container center-contents">
                                        <i class="fa fa-3x fa-credit-card"></i>
                                    </div>
                                </div>
                                <div>
                                    <h3>Secured Payment</h3>
                                    <p>When customers submit sensitive information via the website, such information is protected both online and offline.</p>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                <div class="product-image-contain"><a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product"></a></div>
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
