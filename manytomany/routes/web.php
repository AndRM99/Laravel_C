<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;

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


Route::get('/create', function () {

    $user = User::find(1);

    $user->roles()->save(new Role(['name'=>'Administrador']));

});



Route::get('/read', function () {

    $user = User::findOrFail(1); 

    foreach($user->roles as $role){


        //dd($role);

        echo $role->name;

    }

     //dd($user->roles);
});



// Si en cuentra el rol con nombre de "Administrador",  se actualiza el nombre del rol y se guarda.
Route::get('/update', function () {
    $user = User::findOrFail(1); 

    if($user->has('roles')){

        foreach($user->roles as $role){

            if($role->name == 'Administrador'){

                $role->name = 'Contador';

                $role->save();
            }
        }
        
    }
});


//Elimina 
Route::get('/delete', function (){

    $user = User::findOrFail(1); 


    //Elimina todos los roles 
    //$user->roles()->delete(); 


    //Aqui elimina el rol de id 7, de la tabla de roles
    foreach($user->roles as $role){

        $role->whereId(7)->delete();

    }
    
});




//Le asigna  a todos los de user_id un 8 en roler_id1
Route::get('/attach', function(){

    $user = User::findOrFail(1);

    $user->roles()->attach(8);

});



//Elima todos los datos de roler_id 1
Route::get('/detach', function(){

    $user = User::findOrFail(1);

    //$user->roles()->detach(6);

    $user->roles()->detach();

});


//El código busca y selecciona un usuario con ID 1 en Laravel. 
//Desvincula un posible rol con ID 6 del usuario (línea comentada) y 
//luego sincroniza los roles del usuario para que sean exclusivamente los roles con IDs 5 y 7. 
//En resumen, el código administra la asignación específica de roles a un usuario en Laravel.
Route::get('/sync', function(){

    $user = User::findOrFail(1);

    $user->roles()->sync([5,7]);

});