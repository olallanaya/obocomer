<?php

namespace App\Services;

use App\Restaurante;

class Rest
{
    public function get()
    {
        $restaurante = Restaurante::get();
       
        foreach ($restaurante as $rest) {
            $restArray[$rest->id] = $rest->nombre;
            
        }
        return $restArray;
    }
}