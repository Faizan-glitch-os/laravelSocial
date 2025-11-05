<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AuthController
{
    public function registerUser(Request $request)
    {
        $userData = $request->validate([
            'username' => ['required', 'min:3', 'max:55', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', Password::min(8)]
        ]);
        User::create($userData);

        return 'User Registered';
    }
}
