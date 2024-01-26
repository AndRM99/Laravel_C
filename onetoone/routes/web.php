<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;

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



//se utiliza el método findOrFail() para buscar al usuario con ID 1. 
//Luego, se crea una nueva dirección con la dirección '123 Houston av Ny NY 8888' 
//y se guarda en la relación de direcciones del usuario utilizando el método save().
//En palabras cortas sirve para insertar datos en la tabla addresses
Route::get('/insert', function(){
    $user = User::findOrFail(1);

    //$address = new Address(['name'=>'123 Houston av Ny NY 8888']);

    $address = new Address(['name'=>'Messi Argentina av Nx NX 999']);

    $user->address()->save($address);

});


//Primero, se recupera un registro de la tabla 'addresses' donde el 'user_id' es 1. 
//Luego, se actualiza el campo 'name' de este registro a "Lucho update Av, Mexico"
// y se guarda el registro actualizado en la base de datos.
//Se pueden actualizar los datos basicamente
Route::get('/update', function(){

    $address = Address::whereUserId(1)->first();

    $address->name = "Lucho update Av, Mexico";

    $address->save();

});


//Muestra los datos o permite leerlos uando se accede a la ruta, 
//recupera un usuario con un ID de 1 de la base de datos usando el método findOrFail 
//y luego muestra en pantalla el nombre de la dirección del usuario. 
Route::get('/read', function(){

    $user = User::findOrFail(1);

    echo $user->address->name;

});



//Busca un usuario con ID 1. Luego, intenta eliminar la dirección asociada a ese usuario.
//En este caso el de la tabla address
Route::get('/delete', function(){

    $user = User::findOrFail(1);

    $user->address()->delete();

    return "Eliminado";
});

