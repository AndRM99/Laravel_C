<?php

use Illuminate\Support\Facades\Route;
use App\Models\Staff;
use App\Models\Photo;

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



//Crea datos en la tabla de photos con el path de example.jpg
Route::get('/create', function(){

    $staff = Staff::find(1);

    $staff->photos()->create(['path'=>'example.jpg']);

});


//Permite leer el dato de la columna path de la tablas de photos
Route::get('/read', function(){

    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo){

        return $photo->path;

    }

});



//Permite actualizar o modificar el dato de la columna path de la tablas de photos por el que se desee
// en este caso "Update example.jpg"
Route::get('/update', function(){

    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->first();

    $photo->path = "Update example.jpg";

    $photo->save();

});


//Elimina el dato de id '1', de la columna path de la tablas de photos 
Route::get('/delete', function(){

    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(1)->delete();

});


//LLena los espacios de las columnas de photos si esta vacio
Route::get('/assing', function(){

    $staff = Staff::findOrFail(1);

    $photo = Photo::findOrFail(4);

    $staff->photos()->save($photo);

});


//Vacvia los espacios de las columnas de photos si esta lleno
Route::get('/un-assing', function(){

    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(4)->update(['imageable_id'=>'','imageable_type'=>'']);

});