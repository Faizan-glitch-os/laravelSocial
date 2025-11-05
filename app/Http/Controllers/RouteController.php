<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController
{
    public function homePage()
    {
        return view('homepage');
    }
}
