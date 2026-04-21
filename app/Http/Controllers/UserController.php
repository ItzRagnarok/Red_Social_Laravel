<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Requests\StoreUserRequest;
// use App\Http\Requests\UpdateRequest;

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

//     public function mostrar_editar ($id) {

//      $usuario = User::findOrFail($id);

//      return view('usuarios_editar', [
//          "usuario" => $usuario
//      ]);
//  }

  public function crear (){
        return view('usuarios_crear');
    }

    public function buscar($id){
        
        $usuario = User::find($id);
        
        return view('usuario', [
            "usuario" => $usuario
        ]);
    }

    public function buscarEditar ($id){
        
        $usuario = User::findOrFail($id);
        
        return view('usuario_editar', [
            "usuario" => $usuario
        ]);
    }

    public function almacenar(StoreUserRequest $request){
        
        /*$request->validate([
            "name" => "required|min:5|max:10",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:4"
        ]);*/

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        return redirect('/usuarios');
    }

    public function borrar($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect("/usuarios");
    }

    public function modificar (Request $request, $id){
        $usuario = User::findOrFail($id);

        // $request->validate([
        //     "name" => "required|min:5|max:10",
        //     "email" => "required|email|unique:users,email," . $id,
        //     "password" => "nullable|min:4"
        // ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if ($request->password) {
            $usuario->password = bcrypt($request->password);
        }

        $usuario->save();

        return redirect('/usuarios/'.$id);
    }

 
}
