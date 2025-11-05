<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController
{
    public function showCorrectHomepage()
    {
        $isLoggedIn = auth()->guard('web')->check();

        if ($isLoggedIn) {
            return view('homepage-loggedin');
        } else {
            return view('homepage-loggedout');
        }
    }
}
