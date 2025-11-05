<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AuthController
{
    public function register(Request $request)
    {
        $userData = $request->validate([
            'username' => ['required', 'min:3', 'max:55', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', Password::min(8)]
        ]);
        User::create($userData);

        return redirect('/')->with(['message' => 'Successfully Registered', 'status' => 'success']);
    }

    public function login(Request $request)
    {
        $userData = $request->validate(['loginemail' => 'required|email', 'loginpassword' => 'required']);

        $isLoggedIn = auth()->guard('web')->attempt(['email' => $userData['loginemail'], 'password' => $userData['loginpassword']]);

        if ($isLoggedIn) {
            $request->session()->regenerate();
            return redirect('/')->with(['message' => 'Successfully Logged In', 'status' => 'success']);
        } else {
            return redirect('/')->with(['message' => 'Failed to Logged In', 'status' => 'failed']);
        }
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/')->with(['message' => 'Successfully Logged Out', 'status' => 'success']);
    }
}
