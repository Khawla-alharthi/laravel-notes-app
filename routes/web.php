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
// routing to the main page (welcome)
Route::get('/', function () {
    return view('welcome');
});

// routing to hello page
Route::get('/hello.blade.php', function () {
    return view('hello');
});

