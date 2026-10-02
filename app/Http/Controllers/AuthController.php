<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

// use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function register(Request $request) {
    //     $data = $request->validate([
    //         'name' => ['required', 'string'],
    //         'email' => ['required', 'email', 'unique:users'],
    //         'password' => ['required', 'min:6'],
    //     ]);

    //     $user = User::create($data);

    //     $token = $user->createToken('auth_token')->plainTextToken;

    //     return [
    //         'user' => $user,
    //         'token' => $token
    //     ];    
    // }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'min:6'],
        ]);
        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
          {     
            return response()->json(['error' => 'Unauthorized'], 401);
          }
        $user = User::where('email', $data['email'])->first();

        // Reseteo la posición del usuario a sin asignar
        $user->positions_id = 1;
        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'message' => 'Login successful'
        ]);
    }
    
    public function logout(Request $request) {
        $token = $request->user()->currentAccessToken();

        if ($token instanceof PersonalAccessToken) {
            $token->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Logout successful'
        ]);
    }
}
