<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
class LikeController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
	public function index(){
		//mostramos los likes
		$user = \Auth::user();
		
		/* queremos sacar los likes del usuario identificado*/ 
		$likes = Like::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(5);
		
		return view('like.index',[
			'likes' => $likes
		]);
	}
	
	public function like($image_id){
		// Recoger datos del usuario y la imagen
		$user = \Auth::user();
		
		// No duplicar los likes
		$isset_like = Like::where('user_id', $user->id)
							->where('imagen_id', $image_id)
							->count();
	//hacemos la condicción
		if($isset_like == 0){
			$like = new Like();
			$like->user_id = $user->id;
			$like->imagen_id = (int)$image_id; //x defecto lo guarda como string lo tenemos q convertir
			// Guardar
			$like->save();
		//creamos un archivo json para los mensajes
			return response()->json([
				'like' => $like,
				'message' => 'Has dado like'
			]);
		}else{
			return response()->json([
				'message' => 'El like ya existe'
			]);
        }
        
		
	}
	
	public function dislike($image_id){
		// Recoger datos del usuario y la imagen
		$user = \Auth::user();
		
		// Condicion para ver si ya existe el like y no duplicarlo
		$like = Like::where('user_id', $user->id)
				            ->where('imagen_id', $image_id)
							->first();
	
		if($like){
		
			// Eliminar like
			$like->delete();
			
			return response()->json([
				'like' => $like,
				'message' => 'Has dado dislike correctamente'
			]);
		}else{
			return response()->json([
				'message' => 'El like no existe'
			]);
        }

	}
}