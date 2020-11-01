<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function config(){
    return view('user.config');
    }
    public function update(Request $request)
    { 
        $id= \Auth::user()->id;
       /* $validate =$this ->validate($request, [
            'name'=>'required |string | max:255',
            'nick'=> 'required |string| max:255 ',
            'email'=>' required |string | email| max:255 |unique:users,nick',$id,
        ]*/
        $validate= $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255','unique:users,nick,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            
        ]);
        
        $name= $request->input('name');
        $nick=$request->input('nick');
        $email=$request->input('email'); 
        $direccion=$request->input('direccion');
        $localidad=$request->input('localidad');
       $provincia=$request->input('provincia');
        /*var_dump($id);
        var_dump($name); 
         var_dump($direccion);
         die();*/
    }
    //
}
