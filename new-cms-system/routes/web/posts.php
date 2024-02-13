<?php
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');


Route::middleware(['auth'])->group(function(){

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');

Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');

Route::patch('/admin/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');


Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');

Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');

Route::delete('/posts/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');

});