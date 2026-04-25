<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Libro;
use App\Models\Valoracion;
use App\Http\Requests\StoreValoracionRequest;
use App\Http\Requests\StoreLibroRequest;
use App\Http\Requests\UpdateLibroRequest;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        $valoraciones = Valoracion::where('libro_id', $libro->id)->get();
        return view('libros.show', compact('libro', 'valoraciones'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(StoreLibroRequest $request)
    {
        Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'descripcion' => $request->descripcion,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        
        // Verifica que el usuario autenticado sea el dueño del libro
        if ($libro->user_id !== Auth::id()) {
            return redirect()->route('libros.index')->with('error', 'No tienes permiso para editar este libro.');
        }

        return view('libros.edit', compact('libro'));
    }

    public function update(UpdateLibroRequest $request, $id)
    {
        $libro = Libro::findOrFail($id);

        if ($libro->user_id !== Auth::id()) {
            return redirect()->route('libros.index')->with('error', 'No tienes permiso para actualizar este libro.');
        }

        $libro->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('libros.show', $libro->id)->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);

        if ($libro->user_id !== Auth::id()) {
            return redirect()->route('libros.index')->with('error', 'No tienes permiso para eliminar este libro.');
        }

        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }

    public function valorar(StoreValoracionRequest $request, $id)
    {
        $libro = Libro::findOrFail($id);

        Valoracion::create([
            'puntuacion' => $request->puntuacion,
            'comentario' => $request->comentario,
            'libro_id' => $libro->id,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('libros.show', $libro->id)->with('success', 'Valoración añadida correctamente.');
    }
}
