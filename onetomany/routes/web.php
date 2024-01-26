<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});




//Agrega o crea  datos en la tabla  posts
Route::get('/create', function(){

    $user = User::findOrFail(1);

    //$post = new Post(['title'=>'My first post with Andrey Ramirez', 'body'=>'I try to practice laravel']);

    $user->posts()->save(new Post(['title'=>'My first post with Andrey Ramirez  99', 'body'=>'I try to practice laravel 99']));

});


Route::get('/read', function(){

    $user = User::findOrFail(1);

   // return $user->posts;

   //colection
   //dd($user->posts);


   //muestra el title del id 1 de la tabla posts
   foreach($user->posts as $post){
    
    echo $post->title . "<br>";

   }

});


//Actualiza 
Route::get('/update', function(){

    $user = User::find(1);

    //$user->posts()->whereId(1)->update(['title'=>'I like laravel gg', 'body'=>'This is awesome']);

    $user->posts()->whereId('id','=',2)->update(['title'=>'aravel gg', 'body'=>'This is amazing']);
});


//Elimina datos
Route::get('/delete', function(){


    //Elimina el dato de posts de id 1
    $user = User::find(1);

    $user->posts()->whereId(1)->delete();

    //De esta manera se elimina todos los datos de la tabla posts
    //$user->posts()->delete();
});
