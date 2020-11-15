<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // meter el objeto de las imagenes
use Illuminate\Support\Facades\File;
use App\User;




class UserController extends Controller
{
    public function __construct() /*Se lo añadimos para tener el controlador controlado en todo momento*/ 
    {
        $this->middleware('auth');
    }

    public function config(){
    return view('user.config');
    }
    public function update(Request $request)
    {  //usuario identificado
       
        $user= \Auth::user();
        $id= $user->id;
        //validamos el formulario 
        $validate= $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255','unique:users,nick,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id], //hacemos q sea unico pero q tenga en cuenta el anterior
            
        ]);
        //recogemos todos los datos del formulario
        $name= $request->input('name');
        $nick=$request->input('nick');
        $email=$request->input('email'); 
        $direccion=$request->input('direccion');
        $localidad=$request->input('localidad');
       $provincia=$request->input('provincia');
       //asignar los valores
       $user->name=$name;
       $user->nick=$nick;
       $user->email=$email;
       $user->direccion=$direccion;
       $user->localidad=$localidad;
       $user->provincia=$provincia;
       // imagenenes
       $image=$request->file('image');
       if($image)
       {
        $image_completo=time().$image->getClientOriginalName(); //asi tiene un nombre unico por q le ponemos la hora
        //usuamos storage tambien tenemos q crear la depedencia file. Disck permite seleccionar en donde y con put guardamos la imagen
        //asi la guardamos en storage/app/users
        Storage::disk('users')->put($image_completo,File::get($image));
        //le doy nombre a la imagen el objeto
        $user->image=$image_completo;
        
       }
      
       // hacer el update a la base de datos
       $user->update();

       return redirect()-> route('config')
                            ->with(['message'=>"Usuario actualizado"]);

  
    }
    //
    public function getImage($filename)
    {
        $file=Storage::disk('users')->get($filename);
        return new Response($file,200); //si me lo devuelve bien
    }
    
    public function perfil($id)
    {
        $user= User::find($id);
        return view ('user.perfil',[
            'user'=>$user
        ]);
    }
}

