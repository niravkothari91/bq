<ul>
    @foreach($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">
                {{ $menu_item->title }}
                @if ($menu_item->title === 'Cart')
                    @if (Cart::instance('default')->count() > 0)
                    <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                    @endif
                @endif
            </a>
        </li>
    @endforeach
</ul>
{{--
<div>
    <nav class="navbar navbar-default" style="border-radius: 0px">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">BarQualified</a>
        </div>
        <div class="collapse navbar-collapse js-navbar-collapse">
            @foreach($categories as $category)
                <ul class="nav navbar-nav">
                    <li class="dropdown mega-dropdown">
                        @if($category->page_link)
                            <a href="{{$category->page_link}}" class="dropdown-toggle" data-toggle="dropdown">{{$category->name}}</a>
                        @else
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$category->name}}<span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                        @endif
                        <ul class="dropdown-menu mega-dropdown-menu row">
                            @if($category->subcategories)
                                @foreach($category->subcategories as $subcategory)
                                    <li class="col-sm-3">
                                        <ul>
                                            @if($subcategory->products)
                                                <li class="dropdown-header">{{$subcategory->name}}</li>
                                                @foreach($subcategory->products as $product)
                                                    <li><a href="{{$product->page_link}}">{{$product->name}}</a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                </ul>
            @endforeach
        </div>
        <!-- /.nav-collapse -->
    </nav>
</div>
--}}
