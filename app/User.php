<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    //protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'nick','email', 'password','direccion','localidad','provincia'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function imagenes(){
        return $this->hasMany('App\Imagen');
    }

    //creamos la relacion muchos a muchos por que un restaurante puede tener muchos usuarios y muchos usuarios muchos restaurntes
    /*public function restaurante()
    {
        return  $this->belongsToMany(Restaurante:: class,'rest_user','user_id','rest_id'); //rest_user

    }*/
    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante');
    }
  
}
