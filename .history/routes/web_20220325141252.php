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

Route::get('/test', function () {
    return view('test');
})->middleware('validtoken');


/*Route::get('/test/{name}', function ($name) {
    return view('test');
})->where('name', '[A-Za-z]+');*/

Route::get('/userlist', [UserController::class, 'showuser']);
//Route::get('profile', [UserController::class, 'show'])->middleware('auth');


Route::resource('photos', PhotoController::class);