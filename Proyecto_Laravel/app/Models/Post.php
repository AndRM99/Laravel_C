<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    
    // protected $table = 'posts';

    // protected $primaryKey = 'post_id';


    protected $dates= ['deleted_at'];
    

    //Debemos de hacer esto para poder ingresar los datos en web.php de la funcion create
    protected $fillable = [
        'title',
        'content'

    ];


    public function user(){

        return $this->belongsTo('App\Models\User');

    }


    public function photos(){

        return $this->morphMany('App\Models\Photo', 'imageable');

    }


    public function tags(){

        return $this->morphToMany('App\Models\Tag', 'taggable');

    }

    //Ordenar de manera ascendiente mediante los ids de los datos en la tabla
    // public static function scopeLatest($query){


    //     return $query->orderBy('id', 'asc')->get();
    // }



    use HasFactory;
}
