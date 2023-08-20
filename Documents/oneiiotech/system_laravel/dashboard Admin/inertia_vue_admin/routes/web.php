<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

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


// Route::get('/', function () {
//     return view('welcome');
// });

// not found page
Route::fallback(function(){
    return Inertia::render('backends/404/not_found');
    // return redirect()->route('admin.home');
});

Route::prefix('/admin')->namespace('backends')->group(__DIR__.'/backend.php');
