<ul class="navbar-nav">
    @guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">
            {{----}}
            <span class="navbar-text">Sign Up</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">
            {{--<span class="navbar-text d-none d-lg-block">Login</span>--}}
            <span class="navbar-text">Login</span>
        </a>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="myAccountDD" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-lg fa-user"><span class="d-none d-lg-inline-block text-white">&nbsp;&nbsp;{{auth()->user()->name}}</span></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="myAccountDD" style="z-index: 10000;">
            <a class="dropdown-item" href="{{ route('users.edit') }}">My Account</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                Logout
            </a>
        </div>
        {{--<a class="nav-link" href="">
            <span class="navbar-text d-none d-lg-block">My Account</span>
            <span class="d-xs-block d-lg-none fa fa-3x fa-user"></span>
        </a>--}}
    </li>
    <li class="nav-item"><a class="nav-link btn btn-warning text-dark" href="{{ route('cart.index') }}">Cart
    @if (Cart::instance('default')->count() > 0)
            <span class="badge badge-light"><span>{{ Cart::instance('default')->count() }}</span></span>
    @endif
    </a></li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endguest
    {{-- @foreach($items as $menu_item)
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
    @endforeach --}}
</ul>
