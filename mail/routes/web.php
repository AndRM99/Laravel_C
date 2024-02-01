<?php

use Illuminate\Support\Facades\Route;

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
    //return view('welcome');

    $data =[
        'title'=>'Hello everybody',
        'content'=>'hace mucho calor'
       ];
       Mail::send('emails.test', $data, function($message){
            $message->to('roger.ramirez.mata@est.una.ac.cr', 'tony')->subject('Hello what happend');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
