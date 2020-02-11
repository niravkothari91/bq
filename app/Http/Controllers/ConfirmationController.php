<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('success_message') || session()->has('error_message')) {
            return view('thankyou');
        }

        return redirect()->route('landing-page');

    }
}
