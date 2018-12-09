<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BarQualified - It's right in the name!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Slick CSS for Carousel -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    </head>
    <body>
        <div id="app">
            <header class="with-background">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">MegaMenu</a>
                        </div>


                        <div class="collapse navbar-collapse js-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="dropdown mega-dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Collection <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>

                                    <ul class="dropdown-menu mega-dropdown-menu row">
                                        <li class="col-sm-3">
                                            <ul>
                                                <li class="dropdown-header">New in Stores</li>
                                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="item active">
                                                            <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                                            <h4><small>Summer dress floral prints</small></h4>
                                                            <button class="btn btn-primary" type="button">49,99 €</button>
                                                            <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                                                        </div>
                                                        <!-- End Item -->
                                                        <div class="item">
                                                            <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                                            <h4><small>Gold sandals with shiny touch</small></h4>
                                                            <button class="btn btn-primary" type="button">9,99 €</button>
                                                            <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                                                        </div>
                                                        <!-- End Item -->
                                                        <div class="item">
                                                            <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                                            <h4><small>Denin jacket stamped</small></h4>
                                                            <button class="btn btn-primary" type="button">49,99 €</button>
                                                            <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                                                        </div>
                                                        <!-- End Item -->
                                                    </div>
                                                    <!-- End Carousel Inner -->
                                                </div>
                                                <!-- /.carousel -->
                                                <li class="divider"></li>
                                                <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                                            </ul>
                                        </li>
                                        <li class="col-sm-3">
                                            <ul>
                                                <li class="dropdown-header">Dresses</li>
                                                <li><a href="#">Unique Features</a></li>
                                                <li><a href="#">Image Responsive</a></li>
                                                <li><a href="#">Auto Carousel</a></li>
                                                <li><a href="#">Newsletter Form</a></li>
                                                <li><a href="#">Four columns</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Tops</li>
                                                <li><a href="#">Good Typography</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-sm-3">
                                            <ul>
                                                <li class="dropdown-header">Jackets</li>
                                                <li><a href="#">Easy to customize</a></li>
                                                <li><a href="#">Glyphicons</a></li>
                                                <li><a href="#">Pull Right Elements</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Pants</li>
                                                <li><a href="#">Coloured Headers</a></li>
                                                <li><a href="#">Primary Buttons & Default</a></li>
                                                <li><a href="#">Calls to action</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-sm-3">
                                            <ul>
                                                <li class="dropdown-header">Accessories</li>
                                                <li><a href="#">Default Navbar</a></li>
                                                <li><a href="#">Lovely Fonts</a></li>
                                                <li><a href="#">Responsive Dropdown </a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-header">Newsletter</li>
                                                <form class="form" role="form">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="email">Email address</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                                </form>
                                            </ul>
                                        </li>
                                    </ul>

                                </li>
                            </ul>

                        </div>
                        <!-- /.nav-collapse -->
                    </nav>
                </div>
                {{--<div class="top-nav container">
                    <div class="top-nav-left">
                        <div class="logo">Ecommerce</div>
                        {{ menu('main', 'partials.menus.main') }}
                    </div>
                    <div class="top-nav-right">
                        @include('partials.menus.main-right')
                    </div>
                </div> <!-- end top-nav -->--}}
                {{--<div class="hero container">
                    <div class="hero-copy">
                        <h1>Laravel Ecommerce Demo</h1>
                        <p>Includes multiple products, categories, a shopping cart and a checkout system with Stripe integration.</p>
                        <div class="hero-buttons">
                            <a href="https://www.youtube.com/playlist?list=PLEhEHUEU3x5oPTli631ZX9cxl6cU_sDaR" class="button button-white">Screencasts</a>
                            <a href="https://github.com/drehimself/laravel-ecommerce-example" class="button button-white">GitHub</a>
                        </div>
                    </div> <!-- end hero-copy -->

                    <div class="hero-image">
                        <img src="img/macbook-pro-laravel.png" alt="hero image">
                    </div> <!-- end hero-image -->

                </div> <!-- end hero -->--}}
                <div class="home-page-carousel">
                    @foreach($carouselImages as $image)
                        <a href="{{$image->page_link}}"><img src="{{asset('img/'.$image->url)}}"/></a>
                    @endforeach
                </div>
            </header>

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

            <blog-posts></blog-posts>

            @include('partials.footer')

        </div> <!-- end #app -->
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
    </body>
</html>
