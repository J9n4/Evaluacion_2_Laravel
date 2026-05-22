

<?php $__env->startSection('contenido'); ?>
    <div class="mb-8 border-b border-gray-800 pb-4">
        <span class="text-xs font-mono tracking-widest text-red-500 uppercase font-bold">Núcleo Temático 1</span>
        <h2 class="text-3xl font-extrabold text-white mt-1">Introducción y Fundamentos de Frameworks</h2>
    </div>

    <div class="space-y-6 mb-10">
        <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
            <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-cubes text-red-500 mr-2"></i> Arquitectura MVC en Laravel</h3>
            <p class="text-sm text-gray-400 leading-relaxed">
                Laravel utiliza el patrón **Modelo-Vista-Controlador** para estructurar aplicaciones limpias. El flujo se inicia cuando una petición (Request) entra por el sistema de rutas, el **Controlador** procesa la lógica pidiendo datos al **Modelo**, y finalmente retorna una respuesta renderizada mediante una **Vista** al usuario.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-950 p-5 rounded-xl border border-gray-800">
                <h4 class="text-sm font-bold text-gray-200 mb-1">El Rol de Composer</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Es el manejador de dependencias para PHP. Descarga y administra paquetes externos automatizando el autoloading de clases del proyecto.</p>
            </div>
            <div class="bg-gray-950 p-5 rounded-xl border border-gray-800">
                <h4 class="text-sm font-bold text-gray-200 mb-1">CLI Artisan</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Es la interfaz de línea de comandos de Laravel. Proporciona comandos útiles para generar controladores, modelos, migraciones y ejecutar servidores locales.</p>
            </div>
        </div>
    </div>

    <div class="mb-10">
        <h3 class="text-md font-bold text-gray-300 mb-3"><i class="fas fa-terminal text-blue-400 mr-2"></i> Comandos Artisan Esenciales</h3>
        <div class="bg-gray-950 rounded-xl border border-gray-800 overflow-hidden text-sm">
            <pre><code class="language-bash"># Iniciar el servidor de desarrollo local
php artisan serve

# Crear un nuevo controlador RESTful
php artisan make:controller MiController --resource

# Ejecutar las migraciones pendientes en la Base de Datos
php artisan migrate</code></pre>
        </div>
    </div>

    <div class="bg-gray-950 p-6 rounded-xl border border-gray-800">
        <h3 class="text-lg font-bold text-white mb-2"><i class="fas fa-folder-open text-emerald-500 mr-2"></i> Ejemplo: Explorador del Árbol de Carpetas</h3>
        <p class="text-xs text-gray-400 mb-4">Pasa el cursor (o presiona) sobre las carpetas de Laravel para comprender su función en la estructura física del framework:</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <div class="space-y-2">
                <div onmouseenter="showFolder('app')" class="p-3 bg-gray-900 hover:bg-red-950/40 border border-gray-800 rounded-lg cursor-pointer transition text-sm flex items-center gap-2">
                    <i class="fas fa-folder text-yellow-500"></i> app/
                </div>
                <div onmouseenter="showFolder('config')" class="p-3 bg-gray-900 hover:bg-red-950/40 border border-gray-800 rounded-lg cursor-pointer transition text-sm flex items-center gap-2">
                    <i class="fas fa-folder text-yellow-500"></i> config/
                </div>
                <div onmouseenter="showFolder('routes')" class="p-3 bg-gray-900 hover:bg-red-950/40 border border-gray-800 rounded-lg cursor-pointer transition text-sm flex items-center gap-2">
                    <i class="fas fa-folder text-yellow-500"></i> routes/
                </div>
            </div>
            
            <div class="md:col-span-2 bg-gray-900 p-4 rounded-lg border border-gray-800 flex items-center justify-center min-h-[120px]">
                <p id="folder-desc" class="text-xs text-gray-400 text-center italic">Pasa el cursor sobre una carpeta para ver su descripción oficial...</p>
            </div>
        </div>
    </div>

    <script>
        const descriptions = {
            app: "Contiene el código núcleo de la aplicación: Controladores, Modelos, Middleware y Excepciones.",
            config: "Aloja todos los archivos de configuración del framework (base de datos, servicios, sesiones, etc.).",
            routes: "Define los puntos de entrada de la aplicación. El archivo web.php mapea las peticiones del navegador."
        };
        function showFolder(folder) {
            document.getElementById('folder-desc').innerHTML = `<span class="text-white font-mono block mb-1 font-bold">/${folder}</span> ${descriptions[folder]}`;
            document.getElementById('folder-desc').classList.remove('italic');
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.manual', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\rafaa\OneDrive\Documentos\GitHub\Evaluacion_2_Laravel\Evaluacion2\resources\views/nucleos/nt1.blade.php ENDPATH**/ ?>