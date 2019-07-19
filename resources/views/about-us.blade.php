@extends('layout')

@section('title', 'About Us')

@section('extra-css')
@endsection

@section('content')

    @component('components.breadcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>About Us</span>
    @endcomponent

    <div class="about-us-container container">
        <h1 class="about-us-title">"BarQualified - It's right in the name"</h1>

        <p>
            As we say this we also mean it!<br>
            Welcome to your one stop Bar destination, providing you with the finest quality and the widest
            selection in Designer Glassware, Bar Equipments and Bar Accessories all under one roof!  Our
            e-store for bar supplies stocks everything a bar could possibly require! We are happy to handle
            all your Bar needs.
        </p>

        <p>
            At BarQualified, we strongly believe in serving you the best in quality products, providing
            qualified bartending tools and supplies that will appeal to everyone. Catering to a wide clientele
            - whether you are a publican, a restaurateur, mixologist, a bartender,major bar, a restaurant
            chain or folks at home planning the next party; we are pleased to serve you all!
        </p>
        <p>
            Our Founder, Viraj Doshi, strongly believes in serving our clients with the finest quality products,
            reducing the price barriers and developing strong business relationships. BarQualified was
            formed following his vision to deliver all of bar products and accessories all under one roof, at a
            revolutionary pricing without compromising on the quality. After managing Jalaram Exim Pvt Ltd,
            which has been serving the hotel industry worldwide since 1987, he aims to make BarQualified
            the most customer-centric company, where customers can easily discover and purchase A-Z
            bar products online!
        </p>
        <p>
            In addition to our wide range and innovative products, we pride ourselves on working closely
            with you, the customer, to create efficient bar designs. Whether you are working on a new
            installation or remodeling an existing location, we can also assist you in developing a bar design
            that is just right for you.
        </p>
        <p>
            Email us at <a href="mailto:contactus@barqualified.com">Contactus@barqualified.com</a> directly to get quotes for large orders and to receive
            special discounts.
        </p>
    </div>
@endsection

@section('extra-js')
@endsection
