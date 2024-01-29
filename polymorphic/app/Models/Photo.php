<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    //$fillable se utiliza en los modelos Eloquent para especificar qué atributos pueden ser asignados en masa. 
    protected $fillable = ['path'] ;

    //Relación polimórfica definida utilizando el método morphTo() de Eloquent 
    // permite que un modelo tenga una asociación con uno de varios modelos posibles en función 
    //de un tipo de relación y las claves correspondientes almacenadas en la base de datos.
    public function imageable(){

        return $this->morphoTo();

    }


    use HasFactory;
}
