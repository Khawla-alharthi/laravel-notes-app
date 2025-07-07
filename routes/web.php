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
// routing to the main page (home)
Route::get('/', function () {
    return view('index');
});

// routing to addNote page
Route::get('/addNote.blade.php', function () {
    return view('addNote');
});

// routing to editNote page
Route::get('/editNote.blade.php', function () {
    return view('editNote');
});

