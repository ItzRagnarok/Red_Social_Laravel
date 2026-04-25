<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $libro->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Detalles del Libro -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">{{ $libro->titulo }}</h3>
                            <p class="text-md text-gray-600">Autor: {{ $libro->autor }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('libros.index') }}" class="text-gray-600 hover:underline mt-1">Volver</a>
                            @if(Auth::id() === $libro->user_id)
                                <a href="{{ route('libros.edit', $libro->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">Editar</a>
                                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">Eliminar</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <p class="text-gray-800">{{ $libro->descripcion }}</p>
                </div>
            </div>

            <!-- Listado de Valoraciones -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="text-lg font-bold mb-4">Valoraciones</h4>
                    @if($valoraciones->isEmpty())
                        <p class="text-gray-500">Aún no hay valoraciones para este libro.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($valoraciones as $valoracion)
                                <div class="border-b pb-4">
                                    <div class="flex items-center mb-2">
                                        <span class="font-bold mr-2">{{ $valoracion->user->name ?? 'Usuario' }}</span>
                                        <span class="text-yellow-500">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $valoracion->puntuacion)
                                                    ★
                                                @else
                                                    ☆
                                                @endif
                                            @endfor
                                        </span>
                                    </div>
                                    <p class="text-gray-700">{{ $valoracion->comentario }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Formulario de Valoración -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="text-lg font-bold mb-4">Dejar una valoración</h4>
                    <form action="{{ route('libros.valorar', $libro->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="puntuacion" class="block text-sm font-medium text-gray-700">Puntuación (1-5)</label>
                            <select name="puntuacion" id="puntuacion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="5" {{ old('puntuacion') == 5 ? 'selected' : '' }}>5 Estrellas</option>
                                <option value="4" {{ old('puntuacion') == 4 ? 'selected' : '' }}>4 Estrellas</option>
                                <option value="3" {{ old('puntuacion') == 3 ? 'selected' : '' }}>3 Estrellas</option>
                                <option value="2" {{ old('puntuacion') == 2 ? 'selected' : '' }}>2 Estrellas</option>
                                <option value="1" {{ old('puntuacion') == 1 ? 'selected' : '' }}>1 Estrella</option>
                            </select>
                            @error('puntuacion')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="comentario" class="block text-sm font-medium text-gray-700">Comentario</label>
                            <textarea name="comentario" id="comentario" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('comentario') }}</textarea>
                            @error('comentario')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Enviar Valoración
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
