<header class="with-background">

    @include('partials.banner')

    <nav class="navbar navbar-expand navbar-dark nav-bg justify-content-between">
        <a class="navbar-brand" href="{{route('landing-page')}}" style="color:white !important;">
            <img src="{{asset('img/bq_logo.png')}}" width="60" height="60" alt="">
            BarQualified
        </a>
        <div class="navbar mr-sm-2">
            @include('partials.menus.main-right')
        </div>
    </nav>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light justify-content-between">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @include('partials.menus.main', ['items' => $MyNavBar->roots()])
            </ul>
        </div>
        <div class="">
            @include('partials.search')
        </div>
    </nav><!--/nav-->
</header>
