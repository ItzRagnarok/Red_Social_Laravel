<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Libros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">Listado de Libros</h3>
                        <a href="{{ route('libros.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Añadir Libro</a>
                    </div>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    
                    @if($libros->isEmpty())
                        <p>No hay libros registrados.</p>
                    @else
                        <ul class="space-y-4">
                            @foreach($libros as $libro)
                                <li class="border p-4 rounded flex justify-between items-center">
                                    <div>
                                        <h4 class="font-bold text-md">{{ $libro->titulo }}</h4>
                                        <p class="text-sm text-gray-600">{{ $libro->autor }}</p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('libros.show', $libro->id) }}" class="text-blue-500 hover:underline">Ver</a>
                                        @if(Auth::id() === $libro->user_id)
                                            <a href="{{ route('libros.edit', $libro->id) }}" class="text-yellow-500 hover:underline">Editar</a>
                                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar este libro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                            </form>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
