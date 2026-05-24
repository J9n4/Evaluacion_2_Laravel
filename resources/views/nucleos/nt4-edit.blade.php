@extends('layouts.manual')

@section('contenido')
    <div class="mb-8 border-b border-gray-800 pb-4">
        <span class="text-xs font-mono tracking-widest text-red-500 uppercase font-bold">Núcleo Temático 4</span>
        <h2 class="text-3xl font-extrabold text-white mt-1">Editar Categoría — CRUD Eloquent</h2>
    </div>

    <div class="bg-gray-950 p-6 rounded-xl border border-gray-800 max-w-2xl mx-auto">
        <form method="POST" action="{{ route('nt4.update', $categoria) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-1">Nombre de la Categoría</label>
                <input name="nombre" value="{{ old('nombre', $categoria->nombre) }}" class="w-full bg-gray-950 border {{ $errors->has('nombre') ? 'border-red-500' : 'border-gray-700' }} rounded p-2 text-xs text-white focus:outline-none focus:border-red-500">
                @error('nombre')
                    <p class="text-[11px] text-red-500 font-mono mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-1">Descripción</label>
                <textarea name="descripcion" rows="4" class="w-full bg-gray-950 border {{ $errors->has('descripcion') ? 'border-red-500' : 'border-gray-700' }} rounded p-2 text-xs text-white focus:outline-none focus:border-red-500">{{ old('descripcion', $categoria->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="text-[11px] text-red-500 font-mono mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-bold text-xs py-2 rounded transition-colors">Guardar cambios</button>
                <a href="{{ route('nt4') }}" class="flex-1 text-center bg-gray-800 hover:bg-gray-700 text-white font-bold text-xs py-2 rounded transition-colors">Volver</a>
            </div>
        </form>
    </div>
@endsection
