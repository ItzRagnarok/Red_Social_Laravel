<h1>Editar usuario</h1>

<form action="/usuarios/{{ $usuario->id }}" method="POST">
    @csrf
    @method('PUT')
    <p>Nombre: <input type="text" name="name" value="{{ $usuario->name }}"></p>
    @foreach ($errors->get('name') as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
    <p>Email: <input type="email" name="email" value="{{ $usuario->email }}"></p>
    @foreach ($errors->get('email') as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
    <p>Password: <input type="password" name="password"></p>
    @foreach ($errors->get('password') as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
    <input type="submit" value="Enviar">
</form>