<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleDelMiddleware;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {

    return view('welcome');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/user/roles', ['middleware' => [RoleDelMiddleware::class,'web'], function () {
    return "Middleware role";
}]);

Route::get('/admin', [AdminController::class, 'index']);