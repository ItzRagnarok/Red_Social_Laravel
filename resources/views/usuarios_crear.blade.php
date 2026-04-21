<h1>Creacion de usuario</h1>

<form action="/usuarios" method="POST">
    @csrf
    <p>Nombre: <input type="text" name="name"></p>
    @foreach ($errors->get('name') as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
    <p>Email: <input type="email" name="email"></p>
    @foreach ($errors->get('email') as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
    <p>Password: <input type="password" name="password"></p>
    @foreach ($errors->get('password') as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
    <input type="submit" value="Enviar">
</form>

<!--
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
        @endforeach
    </ul>
@endif
-->