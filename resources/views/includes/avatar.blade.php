              
                @if(Auth::user()->image)
                <div class="avatar_contenedor">
                            <img src="{{route('user.avatar',['filename'=>Auth::user()->image])}}" class="avatar"/>
        </div>
                            @endif