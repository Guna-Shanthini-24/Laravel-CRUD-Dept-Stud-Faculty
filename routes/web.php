<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLoginController;

use App\Http\Controllers\DepartmentController;

use App\Http\Controllers\StudentController;

use App\Http\Controllers\FacultyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
        Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/departments', function () {
    return view('departments');
})->name('departments');
});


Route::get('/auth/google', [GoogleLoginController::class, 'redirectToGoogle']);

Route::get('/auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);


Route::resource('departments', DepartmentController::class);

Route::resource('students', StudentController::class);

Route::resource('faculties', FacultyController::class);

// Route::middleware(['auth', 'check.role:admin'])->group(function () {
//     Route::resource('departments', DepartmentController::class);
//     Route::resource('students', StudentController::class);
//     Route::resource('faculties', FacultyController::class);
// });
