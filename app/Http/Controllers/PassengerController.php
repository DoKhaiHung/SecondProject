<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class PassengerController extends Controller
{
    public function index()
    {
        View::share('title', 'Home');
        return view('passenger.index');
    }
}
