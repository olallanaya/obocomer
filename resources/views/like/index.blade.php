@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
           <div class="col-md-8">
                <h1> Meus likes</h1>  
           
            
            @foreach ($likes as $like)
            
                    @include('includes.image',['image'=>$like->imagen])
                
            @endforeach
             <div class="limpiar"></div>
                {{$likes->links()}}
            </div>  
            </div>
        
    </div>
@endsection
