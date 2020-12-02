<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // meter el objeto de las imagenes
use Illuminate\Support\Facades\File;
use App\Restaurante;
use App\Imagen;
use App\Reserva;

class RestauranteController extends Controller
{
    public function restaurante($atopar = null)
    { //comprobamos si nos pasan un parametros de atopar que se lo pasamos x la url en javascript
        if (!empty($atopar)) {
            // ponemos que nos detecte por algun campo del nick o el nombre
            $rest = Restaurante::where('nombre', 'LIKE', '%' . $atopar . '%')
                ->orderBy('id', 'desc')
                ->paginate(4);
        } else {
            // mostramos los usuarios que tenemos en la aplicacion
            $rest = Restaurante::orderBy('id', 'desc')->paginate(100);
        }
        return view('restaurante.restaurante', ['restaurante' => $rest]);
    }
    public function getImage($filename)
    { //usamos las dos tanto para la imagen como para la foto del menu
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200); //si me lo devuelve bien
    }
  

    public function create()
    {
        //vamos a cargar la vista para crear el formulario
        return view('restaurante.create');
    }
    public function save(Request $request)
    {
        //guardar los datos enviados del forumulario
       
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:restaurantes,email'], //hacemos q sea unico pero q tenga en cuenta el anterior

        ]);
        //recogemos todos los datos del formulario
        $name = $request->input('name');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $descripcion = $request->input('descripcion');
        $direccion = $request->input('direccion');
        $localidad = $request->input('localidad');
        $provincia = $request->input('provincia');
        $imagen_ruta = $request->file('image_path');
        $menu=$request->file('menu');

        $restaurante = new Restaurante(); //creamos un nuevo objeto
        //asignar los valores para la vase de datos
        $restaurante->nombre = $name;
        $restaurante->email = $email;
        $restaurante->telefono = $telefono;
        $restaurante->descripcion = $descripcion;
        $restaurante->direccion = $direccion;
        $restaurante->localidad = $localidad;
        $restaurante->provincia = $provincia;
       
        // imagenenes
        if ($imagen_ruta) {
            $image_completo = time() . $imagen_ruta->getClientOriginalName();
            Storage::disk('users')->put($image_completo, File::get($imagen_ruta));
            $restaurante->image = $image_completo; //esto es lo q guardaremos en la base de datos
        }
        if ($menu) {
            $menu_completo = time() . $menu->getClientOriginalName();
            Storage::disk('users')->put($menu_completo, File::get($menu));
            $restaurante->menu = $menu_completo; //esto es lo q guardaremos en la base de datos
        }

        $restaurante->save(); //lo guardamos a la base de datos
        return redirect()->route('restaurante.restaurante')->with(['message' => 'Novo bar creado con exito']);
    
    }

    public function listado()
    {
        //vamos a cargar la vista del listado de todos los forumularios
        $rest = Restaurante::orderBy('id', 'desc')->paginate(10);
      
        return view('restaurante.listado', ['restaurante' => $rest]);
    }
  

    public function detalle($id)
    {
        
        $restaurante = Restaurante::find($id);
        return view('restaurante.detalle', [
            'restaurante' => $restaurante
        ]);
    }
    public function borrar($id)
    {  //Sacamos todos los datos asociados a la imagen para poder borrarlo de la base de datos 
      
        $restaurante = Restaurante::find($id);
        $reservas = Reserva::where('rest_id', $id)->get();
        $imagenes = Imagen::where('rest_id', $id)->get();
        if($restaurante){
         if ($reservas  && count($reservas) >= 1) {
                foreach ($reservas as $reserva) {
                    $reserva->delete();
                    Storage::disk('users')->delete($reserva->image);
                    Storage::disk('users')->delete($reserva->menu);
                }
            }

            //eliminar imagenes
               if ($imagenes  && count($imagenes) >= 1) {
                foreach ($imagenes as $imagen) {
            Storage::disk('imagenes')->delete($imagen->image_path);
             $imagen->delete();
               }
               }
            $restaurante->delete();
            $message = array('message' => ' o bar borrouse');
        
    }
        else {
            $message = array('message' => 'O bar non se borrou');
        }
        
        //vamos a la pagina principal y con una sesion flash para ver el mensaje
        return redirect()->route('restaurante.listado')->with($message);
    }
    public function edit($id){
	
        $restaurante = Restaurante::find($id);
		
	
			return view('restaurante.editar', [
				'restaurante' => $restaurante
			]);
	
	}
	
	public function update(Request $request){
        $rest_id=$request->input('rest_id');
		//Validación
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $rest_id], //hacemos q sea unico pero q tenga en cuenta el anterior

        ]);
		
        // Recoger datos
       
        $name = $request->input('name');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $descripcion = $request->input('descripcion');
        $direccion = $request->input('direccion');
        $localidad = $request->input('localidad');
        $provincia = $request->input('provincia');
        $image = $request->file('image');
        $menu=$request->file('menu');
		
		// Conseguir objeto image
		$restaurante = Restaurante::find($rest_id);
    
        //asignar los valores para la base de datos
        $restaurante->nombre = $name;
        $restaurante->email = $email;
        $restaurante->telefono = $telefono;
        $restaurante->descripcion = $descripcion;
        $restaurante->direccion = $direccion;
        $restaurante->localidad = $localidad;
        $restaurante->provincia = $provincia;

		
		// Subir fichero
	
        
          // imagenenes
          if ($image) {
            $image_completo = time() . $image->getClientOriginalName();
            Storage::disk('users')->put($image_completo, File::get($image));
            $restaurante->image = $image_completo; //esto es lo q guardaremos en la base de datos
        }
        if ($menu) {
            $menu_completo = time() . $menu->getClientOriginalName();
            Storage::disk('users')->put($menu_completo, File::get($menu));
            $restaurante->menu = $menu_completo; //esto es lo q guardaremos en la base de datos
        }
		
		// Actualizar registro
		$restaurante->update();
		
		return redirect()->route('restaurante.detalle', ['id' => $rest_id])
						 ->with(['message' => 'Imagen actualizada con exito']);
    }

}

