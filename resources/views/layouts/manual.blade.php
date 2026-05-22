<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel - UNACH 2026</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css">
</head>
<body class="bg-gray-900 text-gray-100 flex h-screen overflow-hidden">

    <aside class="w-72 bg-gray-950 border-r border-gray-800 flex flex-col justify-between">
        <div class="p-6">
            <h1 class="text-xl font-black text-red-500 flex items-center gap-2 tracking-tight">
                <i class="fa-solid fa-computer"></i></i> LARAVEL DOCS
            </h1>
            <p class="text-[10px] text-gray-500 font-mono mt-1 uppercase tracking-widest">UNACH · Ing. Civil Informática</p>
            
            <nav class="mt-8 space-y-1.5">
                <a href="{{ route('nt1') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('nt1') ? 'bg-red-600/10 text-red-400 border border-red-500/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <i class="fas fa-layer-group text-xs"></i> NT1: Fundamentos
                </a>
                <a href="{{ route('nt2') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('nt2') ? 'bg-red-600/10 text-red-400 border border-red-500/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <i class="fas fa-route text-xs"></i> NT2: Rutas y Controladores
                </a>
                <a href="{{ route('nt3') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('nt3') ? 'bg-red-600/10 text-red-400 border border-red-500/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <i class="fas fa-code text-xs"></i> NT3: Blade & Vistas
                </a>
                 <a href="{{ route('nt4') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('nt4') ? 'bg-red-600/10 text-red-400 border border-red-500/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <i class="fas fa-database text-xs"></i> NT4: Eloquent ORM
                </a>
                <a href="{{ route('nt5') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('nt5') ? 'bg-red-600/10 text-red-400 border border-red-500/20' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                    <i class="fas fa-check-circle text-xs"></i> NT5: Validaciones
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-gray-800 bg-gray-900/50 text-xs text-gray-400 space-y-1">
            <p><span class="text-gray-600 font-medium">Por:</span> Rafael Aruti y Jonathan Huaylla</p>
            <p><span class="text-gray-600 font-medium">Año:</span> 2026</p>
        </div>
    </aside>

    <main class="flex-1 overflow-y-auto p-8 md:p-12 bg-gray-900">
        <div class="max-w-4xl mx-auto">
            @yield('contenido')
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-markup-closure.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>
</body>
</html>