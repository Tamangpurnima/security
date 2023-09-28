<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')->group(function () {
    Route::middleware('auth:admin')->group(function () {
        // Admin-specific routes here
    });
});

Route::prefix('student')->group(function () {
    Route::middleware('auth:student')->group(function () {
        // Student-specific routes here
    });
});

Route::prefix('college')->group(function () {
    Route::middleware('auth:college')->group(function () {
        // College-specific routes here
    });
});


// Admin routes
Route::get('admin/login', 'Auth\AdminAuthController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@authenticate');
Route::post('admin/logout', 'Auth\AdminAuthController@logout')->name('admin.logout');

// Student routes
Route::get('student/login', 'Auth\StudentAuthController@showLoginForm')->name('student.login');
Route::post('student/login', 'Auth\StudentAuthController@authenticate');
Route::post('student/logout', 'Auth\StudentAuthController@logout')->name('student.logout');

// College routes
Route::get('college/login', 'Auth\CollegeAuthController@showLoginForm')->name('college.login');
Route::post('college/login', 'Auth\CollegeAuthController@authenticate');
Route::post('college/logout', 'Auth\CollegeAuthController@logout')->name('college.logout');

