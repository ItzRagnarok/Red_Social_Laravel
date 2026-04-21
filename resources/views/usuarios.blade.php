<h1>Lista de usuarios</h1>

<ul>
    @foreach ($usuarios as $usuario)
        <li>
            <a href="/usuarios/{{ $usuario->id }}">
                {{ $usuario->name }}</a> - {{ $usuario->email }}
            <a href="/usuarios/{{ $usuario->id }}/editar">Editar</a>
            <form action = "/usuarios/{{ $usuario->id }}" method = "POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <input type="submit" value="Borrar">
        </li>
    @endforeach
</ul>