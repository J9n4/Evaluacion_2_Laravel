@extends('layouts.manual')

@section('contenido')
    <div class="mb-8 border-b border-gray-800 pb-4">
        <span class="text-xs font-mono tracking-widest text-red-500 uppercase font-bold">Núcleo Temático 5</span>
        <h2 class="text-3xl font-extrabold text-white mt-1">Formularios y Validaciones</h2>
    </div>

    <div class="space-y-6 mb-10">
        <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
            <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-shield-alt text-red-500 mr-2"></i> Protección CSRF y Validación</h3>
            <p class="text-sm text-gray-400 leading-relaxed">
                Todos los formularios POST en Laravel requieren obligatoriamente la directiva de seguridad <code class="text-red-400 font-mono">@@csrf</code> para evitar ataques de falsificación de peticiones en sitios cruzados. La validación se gestiona de forma centralizada en el controlador usando el método <code class="text-red-400 font-mono">$request->validate()</code>.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-950 p-5 rounded-xl border border-gray-800">
                <h4 class="text-sm font-bold text-gray-200 mb-1">Reglas Comunes</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Reglas integradas potentes como: <code class="text-red-400 font-mono">required</code>, <code class="text-red-400 font-mono">email</code>, <code class="text-red-400 font-mono">min:3</code>, y <code class="text-red-400 font-mono">unique</code> que detienen la ejecución si los criterios no se cumplen.</p>
            </div>
            <div class="bg-gray-950 p-5 rounded-xl border border-gray-800">
                <h4 class="text-sm font-bold text-gray-200 mb-1">Form Request Objects</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Clases dedicadas externas para aislar por completo la lógica de validación fuera de los controladores principales, manteniendo el código limpio y mantenible.</p>
            </div>
        </div>
    </div>

    <div class="mb-10">
        <h3 class="text-md font-bold text-gray-300 mb-3"><i class="fas fa-code text-blue-400 mr-2"></i> Lógica de Validación en el Controlador</h3>
        <div class="bg-gray-950 rounded-xl border border-gray-800 overflow-hidden text-sm">
            <pre><code class="language-php">public function store(Request $request)
{
    // Las reglas devuelven un error automático si fallan
    $datosValidados = $request->validate([
        'email' => 'required|email|unique:usuarios',
        'password' => 'required|min:6|confirmed',
    ]);

    // Si pasa, continúa la persistencia...
}</code></pre>
        </div>
    </div>

    <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
        <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-check-circle text-emerald-500 mr-2"></i> Ejemplo Práctico: Demo de Captura de Errores de Validación</h3>
        <p class="text-xs text-gray-400 mb-4">Ingresa datos inválidos (ej. deja campos vacíos o pon un correo sin formato) para ver cómo reacciona en vivo el sistema de alertas de Laravel:</p>

        <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 max-w-md mx-auto">
            <form onsubmit="validarFormularioSimulado(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-400 mb-1">Correo Electrónico:</label>
                    <input type="text" id="valEmail" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-xs text-white focus:outline-none focus:border-red-500" placeholder="ejemplo@unach.cl">
                    <span id="errorEmail" class="text-[11px] text-red-500 font-mono mt-1 hidden">El campo email es obligatorio y debe ser válido.</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 mb-1">Contraseña (Mínimo 6 caracteres):</label>
                    <input type="password" id="valPass" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-xs text-white focus:outline-none focus:border-red-500">
                    <span id="errorPass" class="text-[11px] text-red-500 font-mono mt-1 hidden">La contraseña debe tener al menos 6 caracteres.</span>
                </div>

                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold text-xs py-2 rounded transition-colors">
                    Simular Envío ($request->validate())
                </button>
            </form>
            
            <div id="exitoMsg" class="mt-4 p-2 bg-emerald-500/10 border border-emerald-500/30 rounded text-emerald-400 text-center font-bold text-xs hidden">
                ¡Validación aprobada! Datos listos para el Model::create().
            </div>
        </div>
    </div>

    <script>
        function validarFormularioSimulado(e) {
            e.preventDefault();
            const email = document.getElementById('valEmail').value;
            const pass = document.getElementById('valPass').value;
            
            const errEmail = document.getElementById('errorEmail');
            const errPass = document.getElementById('errorPass');
            const exito = document.getElementById('exitoMsg');

            let tieneError = false;

            // Simulación de regla 'required' y 'email'
            if(!email || !email.includes('@')) {
                errEmail.classList.remove('hidden');
                tieneError = true;
            } else {
                errEmail.classList.add('hidden');
            }

            // Simulación de regla 'min:6'
            if(!pass || pass.length < 6) {
                errPass.classList.remove('hidden');
                tieneError = true;
            } else {
                errPass.classList.add('hidden');
            }

            if(!tieneError) {
                exito.classList.remove('hidden');
            } else {
                exito.classList.add('hidden');
            }
        }
    </script>
@endsection