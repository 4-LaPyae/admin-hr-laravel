<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response()->json([
            "error"=>"false",
            "message"=>"employeeList",
            "data"=>$employees
        ]);
    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return response()->json([
            "error"=>"false",
            "message"=>"employee create successfully",
            "data"=>$employee
        ], 201);
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
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
            
        ], 201);
    }
}
