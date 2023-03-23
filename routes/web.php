<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PageController::class,'index']);

    Route::prefix('/')->middleware(['auth','verified','admin'])->group(function() {
        Route::get('/video/create/{slug}', [VideoController::class,'create']);
        Route::get('/video/{slug}/edit', [VideoController::class,'edit']);
        Route::delete('/video/{slug}', [VideoController::class,'destroy']);
        Route::post('/video', [VideoController::class,'store']);
        Route::resource('/video', VideoController::class);
        // Route::post('/courses', [CourseController::class,'index']);
        // Route::post('/courses/{slug}', [CourseController::class,'show']);
        
        // Route::post('/courses/create', [CourseController::class,'create']);
        // Route::get('/courses/create', [CourseController::class,'create']);

        // Route::get('/courses/{slug}/edit', [CourseController::class,'edit']);

        // Route::delete('/courses/{slug}', [CourseController::class,'destroy']);
        
        Route::resource('/courses', CourseController::class);
        Route::resource('/users', UserController::class);
        Route::get('/users/{id}/show', [UserController::class,'show']);

    });
    Route::resource('/video', VideoController::class)->only(['show'])->middleware(['auth']);
    Route::resource('/courses', CourseController::class)
    ->only(['index','show'])->middleware(['auth']);//middleware(['auth','verfited']);

    Route::get('/courses', [CourseController::class,'index']);
    Route::get('/courses/{slug}', [CourseController::class,'show']);
//Route::get('/video/{slug}', [VideoController::class,'show']);



//البارامتير الثاني للريسورس ليس مصفوفة

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
