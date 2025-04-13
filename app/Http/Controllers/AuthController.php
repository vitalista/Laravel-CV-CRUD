<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
       public function login(Request $request)
       {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                'message' => 'Login successful',
                'access_token' => $token,
            ], 200);
        }
    
        return response()->json(['message' => 'Invalid credentials'], 401);
        }
   
       public function logout(Request $request)
       {
        try {
            // Delete the current access token
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Logout successful'], 200);
            } catch (\Exception $e) {
                // Log the exception message
                Log::error('Logout failed: ' . $e->getMessage());
        
                return response()->json([
                    'message' => 'Logout failed',
                    'error' => $e->getMessage()
                ], 500);
            }
       }
   
       public function register(Request $request)
       {
    
           $validated = $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|string|email|max:255|unique:users',
               'password' => 'required|string|min:8|confirmed', // Confirm password validation
           ]);
       
           $user = User::create([
               'name' => $validated['name'],
               'email' => $validated['email'],
               'password' => Hash::make($validated['password']),
           ]);
            
           return response()->json([
               'message' => 'Registration successful',
           ], 200);
       }
       
   
       public function checkSession()
       {
           return response()->json(['user' => Auth::user()]);
       }
}
