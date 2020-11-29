<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request; 
use Illuminate\Http\RedirectResponse;

use App\Comentario;

class ComentariosController extends Controller
{
    //
    
    // restrigimos el acceso
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request)
    {
        //validamos los datos
        $validate= $this->validate($request,[
            'imagen_id' => ['integer', 'required'],
            'comentario' => ['string', 'required'],
            
        ]);
        //datos formulario los recogemos
        $user= \Auth::user();
        $image_id = $request->input('imagen_id');
        $comentario = $request->input('comentario');
    $restaurante=$request->input('rest_id');
        //creamos un objeto comentario y asignamos los valores a los campos de la base de datos
   
        $coment=new Comentario();
        $coment->user_id=$user->id;
        $coment->rest_id=$restaurante;
        $coment->imagen_id=$image_id;
        $coment->contenido=$comentario;
      

        //guardamos
        $coment->save();
        // vamos a la pagina anterior e mostramos el mesaje en una sesion flash
        return redirect()->route('image.detalle', ['id' => $image_id])
        ->with([
           'message' => 'Publicaches un comentario con exito'
        ]);
    
    }
    public function borrar($id){
		// Conseguir datos del usuario identificado
		$user = \Auth::user();
		
		// Conseguir objeto del comentario
		$comment = Comentario::find($id);
		
        // CSolo se permite borrar si se es el dueño lo hay q comprobar
		if($user && ($comment->user_id == $user->id || $comment->imagen->user_id == $user->id)){
			$comment->delete(); //asi lo ilimnamos del orm y de la base de datos
			
			return redirect()->route('image.detalle', ['id' => $comment->imagen->id])
						 ->with([
							'message' => 'Eliminaches o comentario'
						 ]);
		}else{
			return redirect()->route('image.detalle', ['id' => $comment->imagen->id])
						 ->with([
							'message' => 'O comentario nn se elimnou!!'
						 ]);
		}
	}
}
