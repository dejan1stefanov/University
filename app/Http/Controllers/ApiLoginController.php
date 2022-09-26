<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['message' => 'User login failed'], 499);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('login-token');

        return response()->json(['token' => $token->plainTextToken]);
    }
}
