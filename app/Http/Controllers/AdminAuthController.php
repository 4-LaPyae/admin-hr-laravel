<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:6',
            'photo' => 'nullable',
        ]);

        $validate['password'] = bcrypt($validate['password']);

        $admin = Admin::create($validate);

        return response()->json([
            'error' => false,
            'message' => 'Registration successful. Please login.',
            'data' => $admin,
        ], 201);}

        public function login(Request $request)
        {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            if (Auth::guard('admin')->attempt($credentials)) {
                $admin = Auth::guard('admin')->user();
                $token = $admin->createToken('auth_token')->plainTextToken;
    
                return response()->json([
                    'error' => false,
                    'message' => 'Successfully logged in.',
                    'token' => $token,
                    'admin' => $admin,
                ]);
            }
    
            return response()->json([
                'error' => true,
                'message' => 'Invalid credentials',
            ], 401);
        }
    
}

