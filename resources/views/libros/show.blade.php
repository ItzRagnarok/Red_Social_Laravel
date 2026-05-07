<h1>{{ $libro->titulo }}</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<p><strong>Autor:</strong> {{ $libro->autor }}</p>
<p><strong>Descripción:</strong> {{ $libro->descripcion }}</p>

<a href="{{ route('libros.index') }}">Volver a libros</a>

@if(Auth::id() === $libro->user_id)
    <a href="{{ route('libros.edit', $libro->id) }}">[Editar]</a>
    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro?');">
        @csrf
        @method('DELETE')
        <input type="submit" value="BORRAR">
    </form>
@endif

<hr>

<h2>Valoraciones</h2>
@if($valoraciones->isEmpty())
    <p>Aún no hay valoraciones para este libro.</p>
@else
    <ul>
        @foreach($valoraciones as $valoracion)
            <li>
                <strong>{{ $valoracion->user->name ?? 'Usuario' }}</strong>
                ({{ $valoracion->puntuacion }} Estrellas): 
                {{ $valoracion->comentario }}
            </li>
        @endforeach
    </ul>
@endif

<h3>Dejar una valoración</h3>
<form action="{{ route('libros.valorar', $libro->id) }}" method="POST">
    @csrf
    <div>
        <label for="puntuacion">Puntuación (1-5):</label>
        <select name="puntuacion" id="puntuacion">
            <option value="5" {{ old('puntuacion') == 5 ? 'selected' : '' }}>5 Estrellas</option>
            <option value="4" {{ old('puntuacion') == 4 ? 'selected' : '' }}>4 Estrellas</option>
            <option value="3" {{ old('puntuacion') == 3 ? 'selected' : '' }}>3 Estrellas</option>
            <option value="2" {{ old('puntuacion') == 2 ? 'selected' : '' }}>2 Estrellas</option>
            <option value="1" {{ old('puntuacion') == 1 ? 'selected' : '' }}>1 Estrella</option>
        </select>
        @error('puntuacion')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div>
        <label for="comentario">Comentario:</label><br>
        <textarea name="comentario" id="comentario" rows="3">{{ old('comentario') }}</textarea>
        @error('comentario')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div>
        <input type="submit" value="Enviar Valoración">
    </div>
</form>
