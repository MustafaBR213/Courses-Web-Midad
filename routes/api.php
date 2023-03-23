<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api', 'verified', 'admin'])->group(function () {
    // Videos
    Route::post('/videos', [VideoController::class, 'store']);
    Route::get('/videos/{slug}', [VideoController::class, 'show']);
    Route::put('/videos/{slug}', [VideoController::class, 'update']);
    Route::delete('/videos/{slug}', [VideoController::class, 'destroy']);

    // Courses
    Route::post('/courses', [CourseController::class, 'store']);
    Route::get('/courses/{slug}', [CourseController::class, 'show']);
    Route::put('/courses/{slug}', [CourseController::class, 'update']);
    Route::delete('/courses/{slug}', [CourseController::class, 'destroy']);

    // Users
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
});

Route::middleware(['auth:api'])->group(function () {
    // Videos
    Route::get('/videos', [VideoController::class, 'index']);

    // Courses
    Route::get('/courses', [CourseController::class, 'index']);
});