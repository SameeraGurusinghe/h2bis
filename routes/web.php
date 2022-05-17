<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogAuthController;
use App\Http\Middleware\Authenticate;

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
    return view('main');
});


Route::group(['middleware' =>Authenticate::class ], function () {
    Route::get('/dashboard', [LogAuthController::class,"dashboard"]);
    Route::get('/delete/{id}', [LogAuthController::class,"delete"]);
    Route::get('/logout', [LogAuthController::class,"logout"]);
});

Route::get('/login', [LogAuthController::class,"loginView"])->name("login");
Route::get('/register', [LogAuthController::class,"registerView"]);
Route::get('/createSupplier', [LogAuthController::class,"createSupplierView"]);
Route::post('/createSuppliers', [LogAuthController::class,"createSupplierView2"]);
Route::post('/do-login', [LogAuthController::class,"doLogin"]);
Route::post('/do-register', [LogAuthController::class,"doRegister"]);