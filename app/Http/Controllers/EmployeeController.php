<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('teams')->get();
        return response()->json([
            "error"=>false,
            "message"=>"employeeList",
            "data"=>$employees
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email|unique:employees',
            'password' => 'required|string|min:6',
            'phone'=> 'required',
            'position'=>'required',
            'photo' => 'nullable',
            'salary'=>'required'
        ]);
        $validate['password'] = bcrypt($validate['password']);
        if($validate['photo']){
            $image =$validate['photo'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $path = "https://lapyae.sabahna.ml/uploads/".$imageName;
           $validate['photo'] = $path;
        }
        $employee = Employee::create($validate);
        return response()->json([
            "error"=>false,
            "message"=>"employee create successfully",
            "data"=>$employee
        ]);
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json([
            "error"=>false,
            "message"=>"employee details",
            "data"=>$employee
        ]);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $validate = $request->validate([
            'fullname' => 'required|string',
            'email' => 'required',
            'password' => 'required|string|min:6',
            'phone'=> 'required',
            'position'=>'required',
            'photo' => 'required',
            'salary'=>'required'
        ]);
        $validate['password'] = bcrypt($validate['password']);
        if($validate['photo']){
            $image =$validate['photo'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $path = "https://lapyae.sabahna.ml/uploads/".$imageName;
           $validate['photo'] = $path;
        }else{
            $validate['photo'] = $employee->photo;
        }
        $employee->update($validate);
        return response()->json([
            "error"=>"false",
            "message"=>"employee update successfully",
            "data"=>$employee
        ]);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json([
            "error"=>"false",
            "message"=>"employee Delete successfully",   
        ]);
    }
}