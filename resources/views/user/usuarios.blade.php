@extends('layouts.app')

@section('content')
    <div class="container">
   
        <div class="row justify-content-center">
            
            <div class="col-md-10">
            <div class="titulo text-center">
             <h1>Os comedores</h1>
            </div> 
             <div class="card-body">
             <form method="GET" action="{{ route('user.usuarios') }}" id="buscador">
				<div class="row">
					<div class="form-group col">
						<input type="text" id="buscar" class="form-control" />
					</div>
					<div class="form-group col btn-search">
						<input type="submit" value="Buscar" class="btn btn-success"/>
					</div>
				</div>
			</form>
            </div>
			
                @foreach ($users as $user)
                    <div class="perfil">
                        @if ($user->image)
                            <div class="avatar_contenedor">
                                <img src="{{ route('user.avatar', ['filename' => $user->image]) }}" class="avatar" />
                            </div>
                        @endif
                        <div class="info">
                            <h4>{{ '@' . $user->nick }} </h4>
                            <h6>{{ $user->name }} </h6>
                            <h6>{{ $user->email }} </h6>
                            <h6> Conta creada:{{ $user->created_at }}</h6>
                            <a href="{{ route('perfil', ['id' => $user->id]) }}" class="btn btn-success">Ver perfil</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                @endforeach

                <!-- PAGINACION -->
                <div class="clearfix"></div>
                {{ $users->links() }}
            </div>

        </div>
    </div>
@endsection
