<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function changeLanguage()
    {
        app()->setLocale(request('locale'));
        session()->put('locale', request('locale'));
        return redirect()->home();
    }

}
