<h1>Editar Libro: {{ $libro->titulo }}</h1>

<form action="{{ route('libros.update', $libro->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $libro->titulo) }}">
        @error('titulo')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" value="{{ old('autor', $libro->autor) }}">
        @error('autor')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div>
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4">{{ old('descripcion', $libro->descripcion) }}</textarea>
        @error('descripcion')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div>
        <input type="submit" value="Actualizar Libro">
        <a href="{{ route('libros.index') }}">Cancelar</a>
    </div>
</form>
