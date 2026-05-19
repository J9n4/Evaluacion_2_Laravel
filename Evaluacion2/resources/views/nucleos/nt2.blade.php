@extends('layouts.manual')

@section('contenido')
    <div class="mb-8 border-b border-gray-800 pb-4">
        <span class="text-xs font-mono tracking-widest text-red-500 uppercase font-bold">Núcleo Temático 2</span>
        <h2 class="text-3xl font-extrabold text-white mt-1">Rutas, Controladores y Middleware</h2>
    </div>

    <div class="space-y-6 mb-10">
        <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
            <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-network-wired text-red-500 mr-2"></i> El Sistema de Enrutamiento</h3>
            <p class="text-sm text-gray-400 leading-relaxed">
                Laravel intercepta peticiones HTTP y las mapea explícitamente. Permite inyectar parámetros directamente desde el patrón de la URL (ej: <code class="text-red-400 bg-gray-900 px-1 rounded">{id}</code>) y filtrarlas mediante **Middlewares**, que actúan como capas de inspección previa (por ejemplo, para verificar si un usuario está autenticado antes de ingresar).
            </p>
        </div>
    </div>

    <div class="mb-10">
        <h3 class="text-md font-bold text-gray-300 mb-3"><i class="fas fa-code text-blue-400 mr-2"></i> Sintaxis en `routes/web.php`</h3>
        <div class="bg-gray-950 rounded-xl border border-gray-800 overflow-hidden text-sm">
            <pre><code class="language-php">&lt;?php
use App\Http\Controllers\UserController;

// Ruta GET con un parámetro obligatorio
Route::get('/usuario/{id}', [UserController::class, 'show']);

// Aplicación de un Middleware de protección
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');</code></pre>
        </div>
    </div>

    <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
        <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-sliders-h text-emerald-500 mr-2"></i> Ejemplo: Simulador de Parámetros en Rutas</h3>
        <p class="text-xs text-gray-400 mb-4">Escribe un ID o un nombre en el cuadro de texto para observar cómo Laravel capturaría la variable de manera dinámica:</p>
        
        <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 space-y-4">
            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-500 font-bold mb-1">Escribe un valor de parámetro:</label>
                <input type="text" id="routeInput" oninput="testRoute()" placeholder="Ej: unach2026" class="w-full bg-gray-950 border border-gray-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-red-500 transition">
            </div>

            <div class="p-3 bg-gray-950 rounded border border-gray-800 font-mono text-xs text-yellow-400">
                <span class="text-gray-500 block text-[10px] uppercase font-bold mb-1">URL capturada en el navegador:</span>
                https://unach-laravel.test/usuario/<span id="urlOutput" class="text-red-400 font-bold">...</span>
            </div>
        </div>
    </div>

    <script>
        function testRoute() {
            const val = document.getElementById('routeInput').value;
            document.getElementById('urlOutput').innerText = val ? encodeURIComponent(val) : '...';
        }
    </script>
@endsection