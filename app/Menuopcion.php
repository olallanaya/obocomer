<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menuopcion extends Model
{
    //
    public $table='munuopciones';
    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante','rest_id');
    }
    
}
