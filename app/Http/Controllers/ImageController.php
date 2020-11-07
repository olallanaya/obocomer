<?php

namespace App\Http\Controllers;
use App\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // meter el objeto de las imagenes
use Illuminate\Support\Facades\File;


class ImageController extends Controller
{
    public function __construct() /*Se lo añadimos para tener el controlador controlado en todo momento y restringido el acceso*/ 
    {
        $this->middleware('auth');
    }
    //vamos a crear la imagen
    public function create()
    {
        //vamos a cargar la vista
        return view('image.create');
    }

    //vamos a guardar la imagen en la base de datos
    public function save(Request $request)
    {      //hacemos la validacion
        $validate= $this->validate($request,[
            'descripcion' => 'required',
            'image_path' => 'required | image',
          
            
        ]);
     
        //recogemo datos los datoss
         $imagen_ruta=$request->file('image_path');
        $descripcion= $request->input('descripcion');

       /*var_dump($imagen_ruta);
        var_dump($descripcion);
        die();*/
        //asignamos valores al objeto
         $user= \Auth::user(); //necesitamos acceder a usuario para relacinar el id con la imagen
        $image= new Imagen();
        $image->user_id=$user->id;
  
        $image->descripcion=$descripcion;
    
        //var_dump($user->id);
        //subimos el fichero
        if($imagen_ruta)
        {
            $image_completo=time().$imagen_ruta->getClientOriginalName();
            Storage::disk('imagenes')->put($image_completo,File::get($imagen_ruta));
            $image->image_path=$image_completo; //esto es lo q guardaremos en la base de datos
        }

$image->save(); //asi ya lo guardamos directamente a la vase de datos
//ahora que nos devuelva a la home y que nos muestre q ha sido subida correctamente
return redirect()-> route('home')->with(['message'=>'Subida correctamente']);

    }
}