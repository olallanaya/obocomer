
                <div class="card publicacion">
                <div class="card-header">
                    @if($image->user->image)
                    <div class="avatar_contenedor">
                                <img src="{{route('user.avatar',['filename'=>$image->user->image])}}" class="avatar"/>
                    </div>
                    @endif
                   <div class="contenido">
                    <a href="{{route('perfil',['id'=>$image->user->id])}}">
                        {{$image->user->name}}
                        <span class="nick"> {{ '| @'.$image->user->nick}}</span>
                    </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="imagen-contenido">
                        <img src="{{route('image.file',['filename'=>$image->image_path])}}"/>
                    </div>
                    <div class="descripcion">
                        <span class="nick">{{ '@'.$image->user->nick}}</span>
                        <span class="fecha"> {{ ' | '.\FormatTime::LongTimeFilter($image->created_at)}}</span>
                        <p> {{ $image->descripcion }} </p>
                    </div>  
                  
                    <div class="gustas">
                    {{--mostramos el numero de likees--}}
                
                    
                     {{--comprobamos que el usuario dio al like creamos una variable x defecto el like a false--}}
                      <?php $user_like= false; ?>
                     @foreach ($image->likes as $like)
                        <!--hacemos la condicion de si el usuario identificado es el mismo-->
                        @if ($like->user->id == Auth:: user()->id)
                        <!--si l$user_like a condicion se cumple es true--!>
                            <?php $user_like = true; ?>
                        @endif
                                                 
                     @endforeach
                     @if($user_like)
                         <img class="btn-like" data-id={{$image->id}}src="{{asset('imagenes/up.jpg')}}"/>
                    @else
                          <img  class="btn-dislike" data-id={{$image->id}} src="{{asset('imagenes/down.jpg')}}"/>
                    @endif 
                    
                    <spam class="numero"> {{count($image->likes)}}</spam>
                    </div>
                    <div class="comentarios">
                    
                        <a href="{{route('image.detalle',['id'=>$image->id])}}" class="btn comentarios"> Comentarios ( {{count($image->comentarios)}} )</a>
                     </div>
                </div>
               