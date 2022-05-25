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
    Route::get('/index', [LogAuthController::class,"index"])->name("supplier.index");
    Route::get('/supplier/delete/{id}', [LogAuthController::class,"deleteSupplier"])->name("supplier.delete");
    Route::get('/supplier/edit/{id}', [LogAuthController::class,"editSupplier"]);
    Route::post('/supplier/update/{id}', [LogAuthController::class,"updateSupplier"]);
    Route::get('/logout', [LogAuthController::class,"logout"]);
});

Route::get('/login', [LogAuthController::class,"loginView"])->name("login");
Route::get('/register', [LogAuthController::class,"registerView"]);
Route::get('/supplier/create-supplier', [LogAuthController::class,"supplierView"]);
Route::post('/supplier/make-a-supplier', [LogAuthController::class,"makeSupplier"]);
Route::post('/do-login', [LogAuthController::class,"doLogin"]);
Route::post('/do-register', [LogAuthController::class,"doRegister"]);