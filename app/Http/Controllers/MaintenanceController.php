<?php

namespace App\Http\Controllers;

class MaintenanceController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('maintenance');
    }
}
