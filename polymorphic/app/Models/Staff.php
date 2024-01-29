<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    //$fillable se utiliza en los modelos Eloquent para especificar qué atributos pueden ser asignados en masa. 
    protected $fillable =['name'];

    public function photos(){

        return $this->morphMany('App\Models\Photo', 'imageable');

    }




    use HasFactory;
}
