<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Jobs\UpdateCoupon;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    /**
     * Display the About Us page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutUs() {
        return view('about-us');
    }

    /**
     * Display the terms & conditions page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function termsConditions() {
        return view('terms-and-conditions');
    }

    /**
     * Display the Privacy Policy page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function privacyPolicy() {
        return view('privacy-policy');
    }

    /**
     * Display the terms of use page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function termsOfUse() {
        return view('terms-of-use');
    }
}
