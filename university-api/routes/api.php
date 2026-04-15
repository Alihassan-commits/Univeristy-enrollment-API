<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\EnrollmentController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:api')->group(function () {

    // Admin routes
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('students', StudentController::class);
    });

    // Student routes
    Route::middleware('role:student')->group(function () {
        Route::get('/courses', [CourseController::class, 'index']);
        Route::post('/enroll', [EnrollmentController::class, 'enroll']);
    });

});
