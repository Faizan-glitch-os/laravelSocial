<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController
{
    public function registerUser(Request $request)
    {
        $userData = $request->validate([
            'username' => ['required', 'min:3', 'max:55', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        User::create($userData);

        return 'User Registered';
    }
}
