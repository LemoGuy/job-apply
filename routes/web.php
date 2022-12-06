<?php

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyJobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth')->name('dashboard.')->prefix('dashboard')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('job', JobController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('my-job', MyJobController::class);
});

///JOB CONTROLLER

// All Jobs
Route::get('/', Home::class);

// Show register create form
Route::get('/register', [AuthController::class, 'create'])->middleware('guest');



// Cretae new User
Route::post('/users', [AuthController::class, 'store']);

// Log user out
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


// Show login Form
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');


// Login in user
Route::post('/users/authenticate', [AuthController::class, 'authenticate']);
