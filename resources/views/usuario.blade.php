<h1>Perfil del usuario</h1>
<a href="/usuarios/{{$usuario->id}}/editar/">Editar</a>
<p>Nombre: {{ $usuario->name }}</p>
<p>Email: {{ $usuario->email }}</p>

<a href="/usuarios">Volver a usuarios</a>