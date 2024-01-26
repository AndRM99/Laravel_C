<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{



    //se utiliza para especificar qué campos de la base de datos pueden ser asignados en masa. 
    //Esto es importante para protegerse contra la asignación masiva no deseada
    protected $fillable = [    
        'name'
    ];



    use HasFactory;
}
