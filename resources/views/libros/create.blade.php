<h1>Añadir Libro</h1>

<form action="{{ route('libros.store') }}" method="POST">
    @csrf
    <div>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
        @error('titulo')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" value="{{ old('autor') }}">
        @error('autor')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div>
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div>
        <input type="submit" value="Guardar Libro">
        <a href="{{ route('libros.index') }}">Cancelar</a>
    </div>
</form>
