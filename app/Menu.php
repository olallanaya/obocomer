<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    public $table='menus';
    public function restaurante()
    {
        return $this->belongsTo('App\Restaurante','rest_id');
    }
    
}
