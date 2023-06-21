<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\EmployeeAttendanceRequest;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeAttendances = EmployeeAttendance::with('employee')->whereIn('status',[1,2])->get();
        return response()->json([
            "error"=>false,
            "message"=>"Employee Attendance Lists",
            "data"=>$employeeAttendances
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeAttendanceRequest $request)
    {
        $validator = $request->validated();
        $employeeAttendance = EmployeeAttendance::create($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Employee Attendance created successfully",
            "data"=>$employeeAttendance
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeAttendance $employeeAttendance)
    {
        return response()->json([
            "error"=>false,
            "message"=>"Employee Attendance  Detail",
            "data"=>$employeeAttendance
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeAttendanceRequest $request, EmployeeAttendance $employeeAttendance)
    {
        $validator = $request->validated();
        $employeeAttendance->update($validator);
        return response()->json([
            "error"=>false,
            "message"=>"Employee Attendance updated successfully",
            "data"=>$employeeAttendance
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeAttendance $employeeAttendance)
    {
       $employeeAttendance->status  = 0;
       $employeeAttendance->save();
       return response()->json([
        "error"=>false,
        "message"=>"Employee Attendance deleted successfully",
    ]);
    }
}