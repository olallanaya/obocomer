<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //
    protected $table='reservas';
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    //relacion de muchos a uno con restaurante
    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante','rest_id');
    }
}
