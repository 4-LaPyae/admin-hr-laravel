<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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
        if($validate['photo']){
            $image =$validate['photo'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $path = "https://lapyae.sabahna.ml/".$imageName;
           $validate['photo'] = $path;
        }
         $admin = Admin::create($validate);
         $token = $admin->createToken('auth_token')->plainTextToken;
        return response()->json([
            'error' => false,
            'message'=>'register successful please login',
            'data' => $admin,
            'auth_token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $admin = Auth::user();
            $token = $admin->createToken('auth_token')->plainTextToken;
            return response()->json([
                'error'=>"false",
                'message'=>"Successfully Login",
                'token' => $token,
                'admin' => $admin,
            ]);
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

    public function logout(){
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
        "error"=>false,
         "message"=>"Logout successfully",
        ]);
    }
 
}