<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;
use App\Models\Taggable;
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



//Agrega datos en la tabla de posts, columna 'name' y en la de video, columna 'name'
Route::get('/create', function(){

    $post = Post::create(['name'=>'Mi first post1']);

    $tag1 = Tag::find(1);


    $post->tags()->attach($tag1);

    $video = Video::create(['name'=>'Video.mov']);


    $tag2 = Tag::find(2);
    $video->tags()->attach($tag2);

});


//Muestra los datos de la tabla tags
Route::get('/read', function(){

    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){

        echo $tag->name . '<br>'; 
    }
});

//Actualiza los datos de tags donde encuentra el de name 'php' y lo cambia a 'Update PHP'
// Route::get('/update', function(){

//      $post = Post::findOrFail(1);

//     foreach($post->tags as $tag){
        
//     return $tag->whereName('php')->update(['name'=>'Update PHP']);
//}

//     $post = Post::findOrFail(1);
//     $tag = Tag::find(2);

//     $post->tags()->save($tag);

//     $post->tags()->attach($tag);

//     $post->tags()->sync([2]);

//     $post->tags()->sync([1,2]);
//);

Route::get('/delete', function(){

    $post = Post::find(1);

    foreach($post->tags as $tag){

        $tag->whereId(1)->delete();
    }
});