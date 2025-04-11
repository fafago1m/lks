<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:60',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:10',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('apiauth')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
            'message' => 'Register Berhasil',
        ]);
    }
}
