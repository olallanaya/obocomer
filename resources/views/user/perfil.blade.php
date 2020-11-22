@extends('layouts.app')

@section('content')
<div class="container pantalla">
    <div class="row justify-content-center">
           <div class="col-md-8">
            <div class="perfil">
                 
                     @if($user->image)
                        <div class="avatar_contenedor">
                        <img src="{{route('user.avatar',['filename'=>$user->image])}}" class="avatar"/>
                        </div>
                    @endif
                

                 <div class="col-md-6 info">
                 <h4>{{'@'.$user->nick}} </h4>
                 <h5>{{$user->name}} </h5>
                 <h5>{{$user->email}} </h5>
                 <h5> Conta creada:{{$user->created_at}}</h5> 
                 </div>
            </div>
            </div>
            <div class="clearfix"></div>
                @foreach($user->imagenes as $image)
                    @include('includes.image',['image'=>$image])
                @endforeach
             
            </div>

</div>

        
    </div>
@endsection