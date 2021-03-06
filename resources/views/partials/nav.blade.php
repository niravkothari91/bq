<header class="with-background">

    @include('partials.banner')

    <nav class="navbar navbar-expand navbar-dark nav-bg justify-content-between">
        <a class="navbar-brand" href="{{route('landing-page')}}">
            <img class="company-logo" src="{{asset('img/bq_logo_name.png')}}" alt="BarQualified Logo">
        </a>
        <div class="navbar mr-sm-2">
            @include('partials.menus.main-right')
        </div>
    </nav>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark justify-content-between">
        <button class="navbar-toggler" type="button" id="navBtnExpand">
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
<script>
$(document).ready(function(){
    $('#navBtnExpand').click(function(){
        $('#navbarNavDropdown').slideToggle('slow');
    });
});
</script>
