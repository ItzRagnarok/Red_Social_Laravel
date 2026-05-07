<h1>Listado de Libros</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<a href="{{ route('libros.create') }}">Añadir Libro</a>

@if($libros->isEmpty())
    <p>No hay libros registrados.</p>
@else
    <ul>
        @foreach($libros as $libro)
            <li>
                <strong>{{ $libro->titulo }}</strong> - {{ $libro->autor }}
                <a href="{{ route('libros.show', $libro->id) }}">[Ver]</a>
                @if(Auth::id() === $libro->user_id)
                    <a href="{{ route('libros.edit', $libro->id) }}">[Editar]</a>
                    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de querer eliminar este libro?');">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="BORRAR">
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@endif

<br>
<a href="/dashboard">Volver al Dashboard</a>
