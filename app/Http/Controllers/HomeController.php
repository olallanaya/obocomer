<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $imagenes= Imagen::orderBy('id','desc')->paginate(4);
		return view('home',[
      'images'=>$imagenes]);
		
    }
}