<header class="with-background">

    @include('partials.banner')

    <nav class="navbar navbar-expand navbar-dark nav-bg justify-content-between">
        <a class="navbar-brand" href="{{route('landing-page')}}">
            <img class="company-logo" src="{{asset('img/bq_logo_name.png')}}" alt="BarQualified Logo">
            {{--<div style="display:inline-block">
            <span style="color:white !important;font-weight: bolder;font-size: 22px;">BarQualified</span>
            <span style="display:block;font-size:15px">It's right in the name!</span>
            </div>--}}
        </a>
        <div class="navbar mr-sm-2">
            @include('partials.menus.main-right')
        </div>
    </nav>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark justify-content-between">
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
