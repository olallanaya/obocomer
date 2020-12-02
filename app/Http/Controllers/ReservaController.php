<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reserva;
use App\Restaurante;
class ReservaController extends Controller
{
    //
    public function __construct() /*Se lo añadimos para tener el controlador controlado en todo momento y restringido el acceso*/
    {
        $this->middleware('auth');
    }
    public function create()
    {
        //vamos a cargar la vista
        return view('reserva.create');
    }
    public function save(Request $request)
    { 
    
        //recogemos  datoss
     
        $comentario = $request->input('comentarios');
        $restaurante=$request->input('restaurante');
       $fecha=$request->input('fecha');
       $horario=$request->input('horario');
       $hora=$request->input('hora');
       $numero=$request->input('numero');
        /*var_dump($imagen_ruta);
        var_dump($descripcion);
        die();*/
        //asignamos valores al objeto
        $user = \Auth::user(); //necesitamos acceder a usuario para relacionarlo con  el id con la imagen
        $reserva= new Reserva();
        $reserva->user_id = $user->id;
        $reserva->rest_id=$restaurante;
        $reserva->fecha=$fecha;
        $reserva->horario=$horario;
        $reserva->hora=$hora;
        $reserva->comentarios = $comentario;
        $reserva->numero=$numero;


        //var_dump($user->id);
        //subimos el fichero
      

        $reserva->save(); //asi ya lo guardamos directamente a la vase de datos
        //ahora que nos devuelva a la home y que nos muestre q ha sido subida correctamente
        return redirect()->route('home')->with(['message' => 'Reserva feita mandaremosche un email de confirmacion da mesma']);
    }
}
