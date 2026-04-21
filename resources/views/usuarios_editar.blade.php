<h1>Editar usuario</h1>

<form action="/usuarios/{{$usuario->id}}" method="POST">
    @csrf
    @method("PUT")
    <p>Nombre: <input type="text" name="name" value="{{$usuario->name}}"></p>
    @foreach($errors->get("name") as $error) 
        <div style="color:red">{{$error}}</div>
    @endforeach
    <p>e-Mail: <input type="text" name="email" value="{{$usuario->email}}"></p>
    @foreach($errors->get("email") as $error) 
        <div style="color:red">{{$error}}</div>
    @endforeach
    <p>Contraseña: <input type="text" name="password"></p>
    @foreach($errors->get("password") as $error) 
        <div style="color:red">{{$error}}</div>
    @endforeach
    <input type="submit" value="modificar">

</form>