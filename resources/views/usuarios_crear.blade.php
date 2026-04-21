<h1>Creación de usuario</h1>

<form action="/usuarios" method="POST">
    @csrf
    <p>Nombre: <input type="text" name="name"></p>
    @foreach($errors->get("name") as $error) 
        <div style="color:red">{{$error}}</div>
    @endforeach
    <p>e-Mail: <input type="text" name="email"></p>
    @foreach($errors->get("email") as $error) 
        <div style="color:red">{{$error}}</div>
    @endforeach
    <p>Contraseña: <input type="text" name="password"></p>
    @foreach($errors->get("password") as $error) 
        <div style="color:red">{{$error}}</div>
    @endforeach
    <br>
    <input type="submit" value="enviar">

</form>
<!-- Referencia, esto se puede hacer asi, pero hazlo de la manera superior
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li style="color:red">{{$error}}</li>
        @endforeach
    </ul>
@endif-->