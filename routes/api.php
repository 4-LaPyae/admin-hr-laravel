<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::post('/admin/register', [AuthController::class, 'register']);
Route::post('/admin/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/admin', AdminController::class);
});


Route::post('/employee/employeeregister', [AuthController::class, 'employeeregister']);
Route::post('/employee/employeelogin', [AuthController::class, 'employeelogin']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/employee', AdminController::class);
});


