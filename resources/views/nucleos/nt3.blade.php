@extends('layouts.manual')

@section('contenido')
    <div class="mb-8 border-b border-gray-800 pb-4">
        <span class="text-xs font-mono tracking-widest text-red-500 uppercase font-bold">Núcleo Temático 3</span>
        <h2 class="text-3xl font-extrabold text-white mt-1">Vistas y Blade Templates</h2>
    </div>

    <div class="space-y-6 mb-10">
        <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
            <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-feather-alt text-red-500 mr-2"></i> Motor de Plantillas Blade</h3>
            <p class="text-sm text-gray-400 leading-relaxed">
                Blade es el potente motor de plantillas incluido en Laravel. A diferencia de otros motores, permite el uso de código PHP nativo dentro de las vistas y se compila en código optimizado en caché automáticamente. Sus características clave incluyen la herencia de layouts mediante plantillas base fijas y bloques de control simplificados que evitan abrir y cerrar etiquetas PHP tradicionales.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-950 p-5 rounded-xl border border-gray-800">
                <h4 class="text-sm font-bold text-gray-200 mb-1">Paso de Variables</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Las variables procesadas en los controladores se inyectan a la vista usando arreglos asociativos o la función <code class="text-red-400 font-mono">with()</code>, permitiendo imprimir datos dinámicos de manera fluida.</p>
            </div>
            <div class="bg-gray-950 p-5 rounded-xl border border-gray-800">
                <h4 class="text-sm font-bold text-gray-200 mb-1">Integración de Assets</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Laravel facilita la carga de librerías CSS y JavaScript de manera nativa (ya sea mediante Vite o mediante enlaces de CDN directamente en el Layout base).</p>
            </div>
        </div>
    </div>

    <div class="mb-10">
        <h3 class="text-md font-bold text-gray-300 mb-3"><i class="fas fa-code text-blue-400 mr-2"></i> Sintaxis Blade y Directivas Principales</h3>
        <div class="bg-gray-950 rounded-xl border border-gray-800 overflow-hidden text-sm">
            <pre><code class="language-php">&#123;&#125;-- Impresión de variables con escape automático XSS --&#125;&#125;
&lt;h1&gt;&#123;&#123; $nombre &#125;&#125;&lt;/h1&gt;

&#123;&#125;-- Directiva condicional limpia --&#125;&#125;
@@if($activo)
    &lt;span class="badge"&gt;Usuario Activo&lt;/span&gt;
@@endif

&#123;&#125;-- Bucle de repetición iterativo para colecciones o arreglos --&#125;&#125;
@@foreach($usuarios as $usuario)
    &lt;li&gt;&#123;&#123; $usuario->name &#125;&#125;&lt;/li&gt;
@@endforeach</code></pre>
        </div>
    </div>

    <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
        <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-eye text-emerald-500 mr-2"></i> Renderizador Blade Interactivo </h3>
        <p class="text-xs text-gray-400 mb-4">Selecciona una condición o simulación para ver en vivo cómo el compilador de Blade procesaría las directivas y generaría el código HTML limpio final:</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-900 p-4 rounded-xl border border-gray-800 flex flex-col justify-between">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Simular Variable de Estado:</label>
                    <select id="bladeSelect" onchange="renderBlade()" class="w-full bg-gray-950 border border-gray-700 rounded-lg p-2.5 text-xs text-white focus:outline-none focus:border-red-500">
                        <option value="online">Status == 'online'</option>
                        <option value="offline">Status == 'offline'</option>
                    </select>
                </div>
                
                <div class="mt-4 font-mono text-[11px] bg-gray-950 p-3 rounded border border-gray-800 text-purple-400">
                    <span class="text-gray-500 block text-[10px] mb-1 font-bold">CÓDIGO ORIGEN EN BLADE:</span>
                    @@if($status == 'online')<br>
                    &nbsp;&nbsp;&lt;p&gt;Servidor Activo&lt;/p&gt;<br>
                    @@endif
                </div>
            </div>

            <div class="bg-gray-900 p-4 rounded-xl border border-gray-800 font-mono text-xs flex flex-col justify-between">
                <div>
                    <span class="text-gray-500 block text-[10px] mb-1 font-bold">HTML COMPILADO GENERADO:</span>
                    <div id="htmlOutput" class="p-2 bg-gray-950 rounded border border-gray-800 text-emerald-400 min-h-[36px] text-[11px]">
                        &lt;p&gt;Servidor Activo&lt;/p&gt;
                    </div>
                </div>

                <div class="mt-4">
                    <span class="text-gray-500 block text-[10px] mb-1 font-bold">VISTA RENDERIZADA EN NAVEGADOR:</span>
                    <div id="browserOutput" class="p-2 bg-emerald-500/10 border border-emerald-500/30 rounded text-emerald-400 text-center font-sans font-bold text-xs">
                        Servidor Activo
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function renderBlade() {
            const select = document.getElementById('bladeSelect').value;
            const htmlOut = document.getElementById('htmlOutput');
            const browserOut = document.getElementById('browserOutput');
            
            if(select === 'online') {
                htmlOut.innerText = "<p>Servidor Activo</p>";
                browserOut.innerText = "Servidor Activo";
                browserOut.className = "p-2 bg-emerald-500/10 border border-emerald-500/30 rounded text-emerald-400 text-center font-sans font-bold text-xs";
            } else {
                htmlOut.innerText = "";
                browserOut.innerText = "(Vacío / Oculto)";
                browserOut.className = "p-2 bg-red-500/10 border border-red-500/30 rounded text-red-400 text-center font-sans font-bold text-xs";
            }
        }
    </script>
@endsection