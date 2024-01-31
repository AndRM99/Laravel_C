<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    //Busca 1 id de la columna user_id de la tabla posts de uno a uno.
    public function post(){

        return $this->hasOne('App\Models\Post');
    }

    

    //De uno a muchos
    public function posts(){

        return $this->hasMany('App\Models\Post');
    }


    //De muchos a muchos
    public function roles(){

        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');

        //Perzonalizar los nombres de las columnas de la tablar roles
        //return $this->belongsToMany('App\Models\Role', 'user_roles','user_id', 'role_id');
    }


    public function photos(){

        return $this->morphMany('App\Models\Photo', 'imageable');

    }


    public function getNameAttribute($value){

        //retorna el nombre con la primera letra en mayuscula
       // return ucfirst($value);

        //retorna todo el nombre en mayuscula
        return strtoupper($value);

    }


    public function setNameAttribute($value){


        $this->attributes['name'] = strtoupper($value);



    }



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
