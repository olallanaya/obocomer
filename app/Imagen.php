<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table='imagenes';//le indicaos la tabla q modifica este modelo
    //relacion one to many con los comentarios
    public function comentarios()
    {
        return $this->hasMany('App\Comentario')->orderBy('id','desc'); 
        //saca un array de todos los comentarios lo ordenamos para q nos aparezca el mas nuevo primero
    }
    //relacion one to may con los likes
    public function likes()
    {
        return $this->hasMany('App\Like'); //saca un array de todos los likes
    }
    //relacion de muchos a uno con usuario
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    //relacion de muchos a uno con restaurante
    public function restaurante()
  
    {
        return $this->belongsTo('App\Restaurante','rest_id');
      /*  return $this->hasMany('App\Restaurante');*/
    }
}
