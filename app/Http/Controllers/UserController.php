<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function usuarios() {
        $usuarios = User::all(); //Devuelve todos los usuarios de la base de datos
        return view('usuarios', [
            "usuarios" => $usuarios
        ]);
    }

    public function mostrar_editar ($id) {

     $usuario = User::findOrFail($id);

     return view('usuarios_editar', [
         "usuario" => $usuario
     ]);
 }

 
}
