<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
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

       // hacer el update a la base de datos
       $user->update();

       return redirect()-> route('config')
                            ->with(['message'=>"Usuario actualizado"]);

  
    }
    //
}
