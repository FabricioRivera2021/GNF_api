<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $user = User::where('email', $data['email'])->first();

        if (Auth::attempt($data) && $user) {
            // $request->session()->regenerate();
            // return redirect()->intended('dashboard');
            $token = $user->createToken('auth_token')->plainTextToken;
            return [
                'user' => $user,
                'token' => $token,
                'message' => 'Login successful'
            ];
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    
    public function logout(Request $request) {
        /** @var User $user */
        $user = Auth::user();
        if(!$user){
            return response([
                'sccess' => false
            ], 404);
        }

        $userOk = User::where('id', $user->id)->get();
        // Revoke the token that was used to authenticate the current request...
        // $userOk->currentAccessToken()->delete();

        return [
            'message' => 'Logout successful'
        ];
    }
}
