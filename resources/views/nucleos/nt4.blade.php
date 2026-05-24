@extends('layouts.manual')

@section('contenido')
    <div class="mb-8 border-b border-gray-800 pb-4">
        <span class="text-xs font-mono tracking-widest text-red-500 uppercase font-bold">Núcleo Temático 4</span>
        <h2 class="text-3xl font-extrabold text-white mt-1">Modelos y Bases de Datos — Eloquent ORM</h2>
    </div>

    <div class="space-y-6 mb-10">
        <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
            <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-database text-red-500 mr-2"></i> Configuración y Migraciones</h3>
            <p class="text-sm text-gray-400 leading-relaxed">
                La conexión a la base de datos se define en el archivo <code class="text-red-400 font-mono">.env</code>. Las <strong>Migraciones</strong> actúan como un sistema de control de versiones para la base de datos, permitiendo definir y modificar la estructura de las tablas mediante código PHP reproducible.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-950 p-5 rounded-xl border border-gray-800">
                <h4 class="text-sm font-bold text-gray-200 mb-1">Modelos Eloquent</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Cada tabla posee un Modelo correspondiente para interactuar con ella. Se configuran propiedades esenciales como <code class="text-red-400 font-mono">$fillable</code> (atributos asignables en masa) y <code class="text-red-400 font-mono">$hidden</code>.</p>
            </div>
            <div class="bg-gray-950 p-5 rounded-xl border border-gray-800">
                <h4 class="text-sm font-bold text-gray-200 mb-1">Seeders y Factories</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Permiten alimentar la base de datos con registros de prueba automatizados de manera masiva, agilizando el entorno de desarrollo inicial.</p>
            </div>
        </div>
    </div>

    <div class="mb-10">
        <h3 class="text-md font-bold text-gray-300 mb-3"><i class="fas fa-code text-blue-400 mr-2"></i> Estructura de un Modelo y Relaciones</h3>
        <div class="bg-gray-950 rounded-xl border border-gray-800 overflow-hidden text-sm">
            <pre><code class="language-php">// Ejemplo de Modelo con Relación Uno a Muchos (hasMany)
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    // Una categoría tiene muchos productos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}</code></pre>
        </div>
    </div>

    <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
        <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-terminal text-emerald-500 mr-2"></i> Ejemplo Práctico: Consultas Eloquent en Vivo</h3>
        <p class="text-xs text-gray-400 mb-4">Selecciona un comando ORM para observar la consulta y los resultados reales devueltos desde la base de datos.</p>
        
        <div class="space-y-4">
            <div class="bg-gray-900 p-4 rounded-xl border border-gray-800">
                <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Seleccionar Consulta Eloquent:</label>
                <select id="eloquentSelect" onchange="simularQuery()" class="w-full bg-gray-950 border border-gray-700 rounded-lg p-2.5 text-xs text-white focus:outline-none focus:border-red-500">
                    <option value="all">Categoria::all(); (Listar todo)</option>
                    <option value="with">Categoria::with('productos')->get(); (Carga relacional)</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-900 p-4 rounded-xl border border-gray-800 font-mono text-xs">
                    <span class="text-gray-500 block text-[10px] mb-1 font-bold">CÓDIGO DE LA CONSULTA:</span>
                    <div id="queryCode" class="text-blue-400 font-bold">Categoria::all();</div>
                </div>
                <div class="bg-gray-900 p-4 rounded-xl border border-gray-800 font-mono text-xs">
                    <span class="text-gray-500 block text-[10px] mb-1 font-bold">RESULTADO COLECCIÓN JSON REAL:</span>
                    <pre id="jsonResult" class="text-emerald-400 text-[11px] overflow-x-auto"></pre>
                </div>
            </div>
        </div>
    </div>

    <script>
        const datosAll = {!! $categoriasAll->toJson() !!};
        const datosWith = {!! $categoriasWithProductos->toJson() !!};

        function simularQuery() {
            const op = document.getElementById('eloquentSelect').value;
            const code = document.getElementById('queryCode');
            const json = document.getElementById('jsonResult');

            if (op === 'all') {
                code.innerText = "Categoria::all();";
                json.innerText = JSON.stringify(datosAll, null, 2);
            } else {
                code.innerText = "Categoria::with('productos')->get();";
                json.innerText = JSON.stringify(datosWith, null, 2);
            }
        }

        simularQuery();
    </script>
@endsection