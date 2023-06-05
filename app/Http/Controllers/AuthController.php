<?php

// namespace App\Http\Controllers;

// use App\Models\Admin;
// use App\Models\Employee;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;

// class AuthController extends Controller
// {
//     public function register(Request $request)
//     {
//         $validate = $request->validate([
//             'fullname' => 'required|string',
//             'email' => 'required|email|unique:admins',
//             'password' => 'required|string|min:6',
//             'photo' => 'nullable',
//         ]);

//         $validate['password'] = bcrypt($validate['password']);

//         $admin = Admin::create($validate);

//         // $token = $admin->createToken('auth_token')->plainTextToken;

//         return response()->json([
//             'error' => false,
//             'message'=>'register successful please login',
//             'data' => $admin,
//         ], 201);
//     }

//     public function login(Request $request)
//     {
//         $credentials = $request->validate([
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);

//         if (Auth::attempt($credentials)) {
//             $admin = Auth::user();
//             $token = $admin->createToken('auth_token')->plainTextToken;

//             return response()->json([
//                 'error'=>"false",
//                 'message'=>"Successfully Login",
//                 'token' => $token,
//                 'admin' => $admin,
//             ]);
//         }

//         return response()->json([
//             'message' => 'Invalid credentials',
//         ], 401);
//     }








//     public function employeeregister(Request $request)
//     {
//         $validate = $request->validate([
//             'fullname' => 'required|string',
//             'email' => 'required|email|unique:admins|unique:employees',
//             'phone' => 'required|string',
//             'password' => 'required|string|min:6',
//             'photo' => 'nullable',
//             'position' => 'required|string',
//             'salary' => 'required|numeric',
//         ]);

//         $validate['password'] = bcrypt($validate['password']);

//         $employee = Employee::create($validate);

//         return response()->json([
//             'error' => false,
//             'message' => 'Registration successful. Please login.',
//             'data' => $employee,
//         ], 201);
//     }

//     public function employeelogin(Request $request)
//     {
//         $credentials = $request->validate([
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);

//         if (Auth::attempt($credentials)) {
//             $user = Auth::user();
//             $token = $user->createToken('auth_token')->plainTextToken;

//             return response()->json([
//                 'error'=>"false",
//                 'message'=>"Successfully Login",
//                 'token' => $token,
//                 'data' => $user,
//             ]);
//         }

//         return response()->json([
//             'error'=>"true",
//             'message' => 'Invalid credentials',
//         ], 401);
//     }

    
// }

