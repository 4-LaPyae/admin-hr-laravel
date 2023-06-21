<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTeamController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamEmployeeController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::post('/admin/register', [AuthController::class, 'register']);
Route::post('/admin/login', [AuthController::class, 'login']);

Route::group(['prefix' => 'admin','middleware'=>'auth:sanctum'],function(){
    Route::post('logout',[AuthController::class,'logout']);
    Route::apiResource('employees',EmployeeController::class);
    Route::apiResource('projects',ProjectController::class);
    Route::apiResource('employee-attendance',EmployeeAttendanceController::class);
    Route::apiResource('teams',TeamController::class);
    Route::apiResource('team-employee',TeamEmployeeController::class);
    Route::apiResource('project-team',ProjectTeamController::class);
});