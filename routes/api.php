<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\EmployeeAuthController;
use Illuminate\Support\Facades\Route;


Route::post('/admin/register', [AdminAuthController::class, 'register']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/admin', AdminAuthController::class);
});


Route::post('/employee/register', [EmployeeAuthController::class, 'register']);
Route::post('/employee/login', [EmployeeAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/employee', EmployeeAuthController::class);
});
