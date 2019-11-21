<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class HomeController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/home');
    }
}
