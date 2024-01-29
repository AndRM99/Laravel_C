<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;
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

// Route::get('/about', function () {
//     return "Hi about page";
// });


// Route::get('/contact', function () {
//     return "Hi i am contact";
// });


//  Route::get('/post/{id}/{name}', function ($id, $name) {
//      return "Thi is post number ". $id ." ". $name;
//  });


// Route::get('admin/posts/example', array ('as' => 'admin.home',function(){
//     $url= route('admin.home');

//     return "this url is". $url;
    
//}));


//Route::get('/post/{id}', 'App\Http\Controllers\PostsController@index');

//Route::resource('posts', 'App\Http\Controllers\PostsController');

// Route::get('/contact', 'App\Http\Controllers\PostsController@contact');

// Route::get('post/{id}/{name}/{password}', 'App\Http\Controllers\PostsController@show_post');


//insertar datos en la tabla de posts
// Route::get('/insert', function(){

//     DB::insert('insert into posts(title,content) values(?,?)', ['PHP with Laravel','Laravel is framework used for diferents things']);

// });



// Route::get('/insert', function(){

//     DB::insert('insert into posts(title,content) values(?,?)', ['Laravel curso epic','Laravel muy recomendado']);
// });



//  Route::get('/read', function() {
//      $results = DB::select('select * from posts where id = ?', [1]);

//     Muestra datos de posts
//       return $results;

//      return var_dump($results);

//     foreach($results as $post){
//          return $post->title;
//     }

// });



 //Elimina datos de una tabla
//  Route::get('/delete', function(){

//     $deleted = DB::delete('delete from posts where id = ?', [1]);

//     return $deleted;

// });



// Route::get('/read', function(){

//     $posts = Post::all();

//     foreach($posts as $post){
//        return $post->title;
//     }
// });


//encuentra mediante id un titulo de la tabla posts
// Route::get('/find', function(){

//     $post = Post::find(1);
//     return $post->title;

    // foreach($posts as $post){
    //    return $post->title;
    // }
// });


//encontrar el titulo que sea de un dato de id 9
// Route::get('findwhere', function(){

//     $posts = Post::where('id','9')->orderBy('id','desc')->take(1)->get();

//     return $posts;


// });

// Routre::get('/findmore', function(){

    // $posts = Post::findOrFail(1);
    // return $posts;

//     $posts = Post::where('user_count','<',50)->firstOrFail();

// });

//inserta titulo y contenido nuevo
// Route::get('/basicinsert', function(){
//     $post = new Post;

//     $post ->title = 'New Eloquent ';
//     $post ->content = 'wooao';

//     $post->save();

// });


//Modificamos los datos de la tabla posts de id 9 titulo y contenido 
// Route::get('/basicinsert9', function(){
//     $post = Post::find(9);

//     $post ->title = 'New Eloquent title insert 9';
//     $post ->content = 'New title wooao 9';

//     $post->save();
// });



//Agregamos datos a la tabal de posts titulo y contenido
// Route::get('/create', function(){

//     Post::create(['title'=>'create method', 'content'=>'Im really enjoy']);
    
// });


//Actualizamos los datos de la tabla posts del id 1
// Route::get('/update', function(){

//     Post::where('id', 1)->where ('is_admin', 0)->update(['title'=>'NERW PHP TITLE', 'content'=>'I love to sleep']); 
    
    
// });


//Eliminamos datos de la tabla posts deacuerdo a su id 
// Route::get('/delete', function(){

//     $post = Post::find(1); 

//     $post->delete();
    
    
// });


//Otra manera de eliminar datos de la tabla posts, el 9 es un id 
// Route::get('/delete2', function(){

//     Post::destroy(9); 
    
// });


//Otra manera de eliminar varios datos de la tabla posts, el 10 y 11 es un id 
// Route::get('/delete3', function(){

//     Post::destroy([10,11]); 
    
// });



//Sirve para  mantener un historial de los registros eliminados y, posiblemente, restaurarlos en el futuro
//como es el caso de la columna deleted_at quer al haber eliminado todo muestra null esa columna
// Route::get('/softdelete', function(){
    
//     Post::find(5)->delete();

// });



//Muestra todos los datos de la tabla posts del id 2
//Route::get('/readsoftdelete', function(){
    

    //Muestra todos los datos de la tabla en especifico el de id 2
    // $post =Post::withTrashed()->where('id',2)->get();

    // return $post;



    //Muestra todos los datos en la tabla posts
    // $post =Post::onlyTrashed()->where('is_admin',0)->get();

    // return $post;



    //Muestra todos los datos en la tabla posts, frl id 2
    // $post =Post::withTrashed()->where('id',2)->get();
    //return $post;

//}); 


//Ayuda a restaurar los datos de la tabla posts antes de usar el softdelete, en resumidas palabras elimina lo hecho por softdelete
// Route::get('/restore', function(){
//     Post::withTrashed()->where('is_admin',0)->restore();

// });


//Elimina el dato de la tabla posts que permanentemente los registros eliminados (soft-deleted) donde el campo is_admin es igual a 0 o null.
// Route::get('/forcedelete', function(){
//     Post::onlyTrashed()->where('is_admin',0)->forcedelete();

// });


//Eloquent Relationship of one to one
//Muestra los datos de la tabla posts, con /user/{id que desea ver en este caso '1'}/post
//Route::get('/user/{id}/post', function ($id){

//    De esta manera muestra todo
//   return User::find($id)->post;

//    De esta manera muestra el titulo de la columna con id 1, /user/{id que desea ver en este caso '1'}/post
//    return User::find($id)->post->title;

    //De esta manera muestra el contenido de la columna con id 1, /user/{id que desea ver en este caso '1'}/post
//    return User::find($id)->post->content;

//});

//Eloquent Relationship of one to one al inversa
//Muestra los usuarios de la tabla posts, con/post/{id que desea ver en este caso '1'}/user/post
// Route::get('/post/{id}/user', function($id){

       //Devuelve el primer elemento de la tabla posts en este caso seria el id 1 ya que lo seleccionamos
//     return Post::find($id)->user->name;

// });



//Relacionde uno a muchos (One to Many relatioship)
// Route::get('/posts', function(){

//Devuelve el primer elemento de la tabla posts en este caso seria el primer titulo
//     $user = User::find(1);

//     foreach($user->posts as $post){
//        echo  $post->title . "<br>";
//     }

// });



//De muchos a muchos (Many to Many Relationship)
//Con el /user/{id pones el id que quieras ya sea 1 o 2}/role y te mostrara el roll de ese usuario
// Route::get('/user/{id}/role', function($id){

    // $user = User::find($id);

    // foreach($user->roles as $role){
    //     return $role->name;
    // }


    //Muestra los datos Completos 
//     $user = User::find($id)->roles()->orderBy('id','desc')->get();
//     return $user;
    

// });


//Acceso a la tabla intermedia (Accessing the intermediate table/pivot)
// Route::get('user/pivot', function(){

//     $user = User::find(1);


//     foreach($user->roles as $role){

//         //se utiliza echo para imprimir la propiedad created_at del pivote (tabla pivot) asociado a la relación "muchos a muchos" entre usuarios y roles.
//         echo $role->pivot->created_at;

//         //return $role->pivot;

//     }

// });


//Se puede mostrar el titulo del usuario de nacionalidad de id 3
// Route::get('/user/country', function(){
//     $country = Country::find(3);

//     foreach($country->posts as $post){
//         return $post->title;
//     }
    

// });


//Polymorphic Relations permite asociar un modelo con varios modelos diferentes en una única tabla de base de datos
// Route::get('user/photos', function(){

//     $user = User::find(1);

//     foreach($user->photos as $photo){
//         return $photo;
//     }

// });

// Route::get('post/photos', function(){

//     $post = Post::find(1);

//     foreach($post->photos as $photo){
//         return $photo->$path;
//     }

// });


// Route::get('post/photos', function(){

//     $post = Post::find(1);

//     foreach($post->photos as $photo){
//         echo $photo->$path . "<br>";
//     }

// });

// Route::get('photo/{id}/post', function ($id){

//     $photo = Photo::findOrFail($id);
    
//     return $photo->imageable;


// });


//Polymorphic Many to  Many
// Route::get('/post/tag', function (){
//     $post = Post::find(1);

//     foreach($post->tags as $tag){
//         echo $tag->name;
//     }

// });


// Route::get('/tag/post/', function(){

//     $tag = Tag::find(2);

//     return $tag;

//      foreach($tag->posts as $post){
//      return $post->title;
//}

// });



Route::resource('/posts','PostsController@index');

