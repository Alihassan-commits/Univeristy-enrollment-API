<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role ?? 'student'
        ]);

        return response()->json($user);
    }

    public function login(Request $request)
    {
        if (!auth()->attempt($request->only('email','password'))) {
            return response()->json(['message' => 'Invalid login'], 401);
        }

        $user = auth()->user();

        $token = $user->createToken('API')->accessToken;

        return response()->json([
            'token' => $token,
            'role' => $user->role
        ]);
    }
}
