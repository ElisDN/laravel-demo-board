<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('cabinet.home');
    }
}
