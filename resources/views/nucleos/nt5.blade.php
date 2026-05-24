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
        <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-check-circle text-emerald-500 mr-2"></i> Ejemplo Práctico: Captura de Errores de Validación</h3>
        <p class="text-xs text-gray-400 mb-4">Envía el formulario para que Laravel valide el contenido en el servidor con <code class="text-red-400 font-mono">$request->validate()</code>. Se mostrará un mensaje de éxito cuando los datos sean correctos.</p>

        <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 max-w-md mx-auto">
            @if(session('success'))
                <div class="mb-4 p-3 rounded-lg bg-emerald-500/10 border border-emerald-500 text-emerald-300 text-xs font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('nt5.submit') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-gray-400 mb-1">Nombre completo:</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full bg-gray-950 border {{ $errors->has('nombre') ? 'border-red-500' : 'border-gray-700' }} rounded p-2 text-xs text-white focus:outline-none focus:border-red-500" placeholder="Ej. Ana Pérez">
                    @error('nombre')
                        <p class="text-[11px] text-red-500 font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 mb-1">Correo Electrónico:</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-950 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-700' }} rounded p-2 text-xs text-white focus:outline-none focus:border-red-500" placeholder="ejemplo@unach.cl">
                    @error('email')
                        <p class="text-[11px] text-red-500 font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 mb-1">Contraseña (Mínimo 6 caracteres):</label>
                    <input type="password" name="password" class="w-full bg-gray-950 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-700' }} rounded p-2 text-xs text-white focus:outline-none focus:border-red-500">
                    @error('password')
                        <p class="text-[11px] text-red-500 font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 mb-1">Confirmar contraseña:</label>
                    <input type="password" name="password_confirmation" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-xs text-white focus:outline-none focus:border-red-500" placeholder="Repite tu contraseña">
                </div>

                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold text-xs py-2 rounded transition-colors">Enviar y Validar</button>
            </form>

            @if($errors->any())
                <div class="mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500 text-red-300 text-xs font-semibold">
                    Por favor corrige los errores marcados en el formulario.
                </div>
            @endif
        </div>
    </div>
@endsection