<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['message'=>'User create successfully','token' => $token, 'user'=> $user], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
            
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                $token = $user->createToken('AdminToken')->plainTextToken;
                return response()->json(['token' => $token]);
            }
        }

        if (!auth()->attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = auth()->user()->createToken('authToken')->plainTextToken;

        return response()->json(['message'=>'User login sucessfully','token' => $token],201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => ' User logged out']);
    }

    public function getUser()
    {
        return response()->json(auth()->user());
    }
}
