<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CustomAuthController; 
use Illuminate\Support\Facades\View;
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

/*Route::get('/test', function () {
    return view('test');
})->middleware('validtoken');*/

Route::get('/', function () {
    return redirect('/userlist');
});

/*Route::get('/test/{name}', function ($name) {
    return view('test');
})->where('name', '[A-Za-z]+');*/

Route::get('/test', function () {
    return view('test',['name' => 'Aarti']);
});


Route::get('/userlist', [UserController::class, 'showuser']);
Route::get('/userlist/{id}', [UserController::class, 'updateuser']);
//Route::get('profile', [UserController::class, 'show'])->middleware('auth');


Route::resource('photos', PhotoController::class);
Auth::routes();






/*******custom auth */
Route::get('customlogin', [CustomAuthController::class, 'index'])->name('customlogin');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('customregistration', [CustomAuthController::class, 'customregistration'])->name('customregister'); 
Route::post('custom-registration', [CustomAuthController::class, 'customRegistrationFun'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::group(['middleware' => ['auth','user_access:user']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::group(['middleware' => ['auth','user_access:admin']], function() {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('products', ProductController::class);
});

Route::group(['middleware' => ['auth','user_access:manager']], function() {
    Route::get('/manager/home', [App\Http\Controllers\HomeController::class, 'managerHome'])->name('manager.home');
    Route::resource('products', ProductController::class);
});