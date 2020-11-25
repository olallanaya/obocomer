<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
      public $table='restaurantes';


public function imagenes(){
    return $this->hasMany('App\Imagen');
}
}