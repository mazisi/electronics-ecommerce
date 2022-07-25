<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Traits\HasCookie;

class HomeController extends Controller
{
    public function index()
    {
        HasCookie::setCartCookie();
        return view('welcome');
    }
}
