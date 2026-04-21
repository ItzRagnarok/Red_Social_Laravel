<h1>Lista de usuarios</h1>

@auth
    <p> Hola, {{Auth::user()->name}}</p>
@endauth

<a href="/usuarios/crear/">Crear un nuevo usuario</a>

<ul>
    
    @foreach ($usuarios as $usuario)
        <li>
            <a href="/usuarios/{{$usuario->id}}">{{$usuario->name}}</a> ({{$usuario->email}}) <a href="/usuarios/{{$usuario->id}}/editar">[Editar]</a>
        
        <form action="/usuarios/{{$usuario->id}}" method="POST" style ="display:inline;">
            @csrf
            @method('DELETE')
            <input type="submit" value="BORRAR">
        </form>
        </li>
    @endforeach

</ul>

<form method="POST" action="{{route('logout')}}">
    @csrf
<!--BTW, el codigo de login esta en AuthenticatedSessionController-->
    <input type="submit" value="Cerrar sesión">

</form>