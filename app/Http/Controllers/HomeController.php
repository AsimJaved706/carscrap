<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function quote()
    {
        return view('quote');
    }

    public function thankYou()
    {
        return view('thank-you');
    }
}
