<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table='likes';//le indicaos la tabla q modifica este modelo
    //relacion one to many con los comentarios
   
    //relacion de muchos a uno con usuario
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
   
    //relacion de muchos a uno con restaurante
    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante','rest_id');
    }
    //relacion de muchos a uno con imagenes
    public function imagen()
    {
        return $this->belongsTo('App\Imagen','imagen_id');
    }
}
