<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Vérification du rôle de l'utilisateur
        if ($user->role === 'admin') {
            return response()->json([
                'message' => 'User is an admin',
                'user' => $user
            ]);
        }

        return response()->json([
            'message' => 'User is not an admin',
            'user' => $user
        ]);
    }
}

