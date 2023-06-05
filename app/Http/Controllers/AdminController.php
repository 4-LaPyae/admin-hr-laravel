<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return response()->json([
            'error'=>"false",
            'message'=>"AdminList",
            'data'=>$admins
        ]);
    }

    public function store(Request $request)
    {
        $admin = Admin::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
        ]);

        return response()->json([
            'error'=>"false",
            'message'=>"Admin create successfully",
            'data'=>$admin
        ], 201);
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return response()->json($admin);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
        ]);

        return response()->json([
            'error'=>"false",
            'message'=>"Admin Update successfully",
            'data'=>$admin
        ]);
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->json([
            'error'=>"false",
            'message'=>"Delete admin successfully",
            
        ]);
    }
}

