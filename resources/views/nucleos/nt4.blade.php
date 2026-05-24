@extends('layouts.manual')

@section('contenido')
    <div class="mb-8 border-b border-gray-800 pb-4">
        <span class="text-xs font-mono tracking-widest text-red-500 uppercase font-bold">Núcleo Temático 4</span>
        <h2 class="text-3xl font-extrabold text-white mt-1">CRUD con Eloquent ORM</h2>
        <p class="text-sm text-gray-400 mt-2">Gestiona categorías directamente con Eloquent: crear, leer, actualizar y eliminar registros.</p>
    </div>

    <div class="space-y-6 mb-10">
        <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
            <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-database text-red-500 mr-2"></i> Configuración y Migraciones</h3>
            <p class="text-sm text-gray-400 leading-relaxed">
                La conexión a la base de datos se define en el archivo <code class="text-red-400 font-mono">.env</code>. Las migraciones son el punto de partida: definen las tablas como código PHP y permiten versionar la estructura de datos.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-950 p-5 rounded-xl border border-gray-800">
                <h4 class="text-sm font-bold text-gray-200 mb-1">Modelo Eloquent</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Cada tabla se representa con un modelo en <code class="text-red-400 font-mono">app/Models</code>. Define <code class="text-red-400 font-mono">$fillable</code> para los campos que acepta el método <code class="text-red-400 font-mono">create()</code>.</p>
            </div>
            <div class="bg-gray-950 p-5 rounded-xl border border-gray-800">
                <h4 class="text-sm font-bold text-gray-200 mb-1">Relaciones</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Aquí usamos una relación uno a muchos: una <strong>Categoría</strong> tiene muchos <strong>Productos</strong> con <code class="text-red-400 font-mono">hasMany()</code>.</p>
            </div>
        </div>
    </div>

    <div class="mb-10">
        <h3 class="text-md font-bold text-gray-300 mb-3"><i class="fas fa-code text-blue-400 mr-2"></i> Ejemplo de modelo</h3>
        <div class="bg-gray-950 rounded-xl border border-gray-800 overflow-hidden text-sm">
            <pre><code class="language-php">namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}</code></pre>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500 text-emerald-200 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-10">
        <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
            <h3 class="text-lg font-bold text-white mb-3">Listado de Categorías</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-xs text-gray-300">
                    <thead>
                        <tr class="border-b border-gray-800 text-gray-500 uppercase text-[10px]">
                            <th class="px-3 py-3">ID</th>
                            <th class="px-3 py-3">Nombre</th>
                            <th class="px-3 py-3">Productos</th>
                            <th class="px-3 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categoriasAll as $categoria)
                            <tr class="border-b border-gray-800 hover:bg-gray-900/60">
                                <td class="px-3 py-3">{{ $categoria->id }}</td>
                                <td class="px-3 py-3">{{ $categoria->nombre }}</td>
                                <td class="px-3 py-3">{{ $categoria->productos->count() }}</td>
                                <td class="px-3 py-3 flex flex-wrap gap-2">
                                    <a href="{{ route('nt4.edit', $categoria) }}" class="px-2 py-1 rounded bg-blue-600 hover:bg-blue-500 text-[11px]">Editar</a>
                                    <form action="{{ route('nt4.destroy', $categoria) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2 py-1 rounded bg-red-600 hover:bg-red-500 text-[11px]">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-3 py-4 text-gray-500">No hay categorías registradas aún.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
            <h3 class="text-lg font-bold text-white mb-3">Crear nueva categoría</h3>
            <form method="POST" action="{{ route('nt4.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-gray-400 mb-1">Nombre</label>
                    <input name="nombre" value="{{ old('nombre') }}" class="w-full bg-gray-950 border {{ $errors->has('nombre') ? 'border-red-500' : 'border-gray-700' }} rounded p-2 text-xs text-white focus:outline-none focus:border-red-500">
                    @error('nombre')
                        <p class="text-[11px] text-red-500 font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 mb-1">Descripción</label>
                    <textarea name="descripcion" rows="4" class="w-full bg-gray-950 border {{ $errors->has('descripcion') ? 'border-red-500' : 'border-gray-700' }} rounded p-2 text-xs text-white focus:outline-none focus:border-red-500">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="text-[11px] text-red-500 font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold text-xs py-2 rounded transition-colors">Crear categoría</button>
            </form>
        </div>
    </div>

    <div class="bg-gray-950 p-6 rounded-xl border border-gray-800 mb-10">
        <h3 class="text-lg font-bold text-white mb-3">Gestionar Productos por Categoría</h3>
        <form method="POST" action="{{ route('nt4.producto.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-1">Categoría</label>
                <select name="categoria_id" class="w-full bg-gray-950 border {{ $errors->has('categoria_id') ? 'border-red-500' : 'border-gray-700' }} rounded p-2 text-xs text-white focus:outline-none focus:border-red-500">
                    <option value="">Selecciona una categoría</option>
                    @foreach($categoriasAll as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }} ({{ $categoria->productos->count() }} productos)</option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <p class="text-[11px] text-red-500 font-mono mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-1">Título del Producto</label>
                <input name="titulo" value="{{ old('titulo') }}" class="w-full bg-gray-950 border {{ $errors->has('titulo') ? 'border-red-500' : 'border-gray-700' }} rounded p-2 text-xs text-white focus:outline-none focus:border-red-500" placeholder="Ej. Curso Laravel">
                @error('titulo')
                    <p class="text-[11px] text-red-500 font-mono mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-1">Precio</label>
                <input name="precio" value="{{ old('precio') }}" class="w-full bg-gray-950 border {{ $errors->has('precio') ? 'border-red-500' : 'border-gray-700' }} rounded p-2 text-xs text-white focus:outline-none focus:border-red-500" placeholder="0.00">
                @error('precio')
                    <p class="text-[11px] text-red-500 font-mono mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs py-2 rounded transition-colors">Agregar producto</button>
        </form>
    </div>

    <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
        <h3 class="text-lg font-bold text-white mb-3">Productos actuales</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-xs text-gray-300">
                <thead>
                    <tr class="border-b border-gray-800 text-gray-500 uppercase text-[10px]">
                        <th class="px-3 py-3">ID</th>
                        <th class="px-3 py-3">Título</th>
                        <th class="px-3 py-3">Categoría</th>
                        <th class="px-3 py-3">Precio</th>
                        <th class="px-3 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categoriasAll->flatMap->productos as $producto)
                        <tr class="border-b border-gray-800 hover:bg-gray-900/60">
                            <td class="px-3 py-3">{{ $producto->id }}</td>
                            <td class="px-3 py-3">{{ $producto->titulo }}</td>
                            <td class="px-3 py-3">{{ $producto->categoria->nombre }}</td>
                            <td class="px-3 py-3">{{ number_format($producto->precio, 2) }}</td>
                            <td class="px-3 py-3">
                                <form action="{{ route('nt4.producto.destroy', $producto) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 rounded bg-red-600 hover:bg-red-500 text-[11px]">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-3 py-4 text-gray-500">No hay productos registrados aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
        <h3 class="text-lg font-bold text-white mb-3">Explicación rápida</h3>
        <p class="text-xs text-gray-400 leading-relaxed">
            Este CRUD usa Eloquent para crear, leer, actualizar y eliminar registros de la tabla <code class="text-red-400 font-mono">categorias</code>. Cada acción se gestiona en el controlador <code class="text-red-400 font-mono">NucleoController</code>.
        </p>
    </div>
@endsection