<?php

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

/*
Common Resource Routes:
index - Show all jobs
show - Show single job
create - Show form to create new job
store - Store new job
edit - Show form to edit job
update - Update job
destroy - Delete job
*/

///JOB CONTROLLER

// All Jobs
Route::get('/', [JobController::class, 'index']);
    
    
    // return view('jobs', [
    //     'jobs' => Job::all() // the data is coming from model
    // ]);


/// data is now hard coded, but in future it will become in models
/// elequent is orm, object relational mapper, which will help us with database
/// with sorting filtering nameing searching, 



// Show create form
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');


// Store Job data
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth');

// Update job
Route::put('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');

// Delete job
Route::delete('/jobs/{job}', [JobController::class, 'delete'])->middleware('auth');

// Manage jobs
Route::get('/jobs/manage', [JobController::class, 'manage'])->middleware('auth');

// Manage all jobs
Route::get('/jobs/manageAll', [JobController::class, 'manageAll'])->middleware('auth');

// Single Job

//route model binding
Route::get('/jobs/{job}', [JobController::class, 'show']);
   
    // return view('job', [
    //     'job' => $job
    // ]);


// Show register create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');



// Cretae new User
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// Show login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


// Login in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);





// Route::get('/table', function () {
//     for ($i = 1; $i <= 10; $i++) {
//         echo "$i * 2 = " . $i * 2 . "<br>";
//     }
// });
//// FIRST LECTURE

// Route::get('/hello', function () {
//     return response('<h1>Hello World!</h1>', 200)
//     ->header('Content-Type', 'text/plain')
//     ->header('foo', 'bar');// any custom header value
// });

// Route::get('/posts/{id}', function($id){
//     //helper methos for bugs
//     // dd($id);//500status code, die and dumb, 
//     // ddd($id); //die dumb, and debug, more detailed 
//     return response('Post ' . $id); //returns the post card
// })->where('id', '[0-9]+');//make it only accepts numbers

// Route::get('/search', function(Request $request) {
//     // dd($request);// shows what is in this request object
//     return $request->name . ' ' . $request->city; // directly shows you the contents of that object
// });