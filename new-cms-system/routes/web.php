<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');


Route::middleware('auth')->group(function(){

    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
    
    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');

    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::patch('/admin/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');

    Route::get('/admin/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');

    Route::delete('/admin/posts/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');

    
});