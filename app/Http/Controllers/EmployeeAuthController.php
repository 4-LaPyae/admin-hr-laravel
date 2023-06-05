<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeAuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email|unique:admins|unique:employees',
            'phone' => 'required|string',
            'password' => 'required|string|min:6',
            'photo' => 'nullable',
            'position' => 'required|string',
            'salary' => 'required|numeric',
        ]);

        $validate['password'] = bcrypt($validate['password']);

        $employee = Employee::create($validate);

        return response()->json([
            'error' => false,
            'message' => 'Registration successful. Please login.',
            'data' => $employee,
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('employee')->attempt($credentials)) {
            $employee = Auth::guard('employee')->user();
            $token = $employee->createToken('auth_token')->plainTextToken;

            return response()->json([
                'error' => false,
                'message' => 'Successfully logged in as employee.',
                'token' => $token,
                'employee' => $employee,
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Invalid employee credentials.',
        ], 401);
    }
}
