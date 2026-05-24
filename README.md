# Evaluacion_2_Laravel
- Integrantes Del grupo: Rafael Aruti y Jonathan Huaylla
## Introducción

Este proyecto es una aplicación Laravel que utiliza e explica los conceptos fundamentales tales como: Eloquent ORM, migraciones, seeders, validación y formularios Blade. Para cumplir con los requerimientos de nuestra segunda evaluacion de nuestro curso de laravel.

## Requisitos previos

- PHP 8.1 o superior
- Composer
- Una base de datos tal sea: MySQL, MariaDB, SQLite, PostgreSQL
- Node.js y npm (opcional para activos y Vite)

## Instalación de Laravel y dependencias

1. Clona el repositorio o descarga el proyecto.

- Esto se puede hacer desde el mismo github copiando la URL o por la aplicacion Github Desktop

2. En la carpeta del proyecto, instala dependencias PHP con Composer:

```bash
composer install
```

3. Copia el archivo de entorno y ajusta la configuración de la base de datos:

```bash
cp .env.example .env
```

4. Genera la clave de la aplicación:

```bash
php artisan key:generate
```

5. Configura los datos de conexión a la base de datos en el archivo `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_basedatos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

## Migraciones, seeders y datos de prueba

1. Ejecuta las migraciones para crear las tablas:

```bash
php artisan migrate
```

2. Si deseas poblar con datos de prueba, ejecuta los seeders:

```bash
php artisan db:seed
```

3. Para reiniciar la base de datos y ejecutar migraciones y seeders en limpio:

```bash
php artisan migrate:fresh --seed
```

## Instalación de activos y compilación (opcional)

Si el proyecto usa Vite y activos frontend, instala npm y compila los recursos:

```bash
npm install
npm run dev
```

## Ejecución local

Inicia el servidor de desarrollo de Laravel:

```bash
php artisan serve
```

Luego abre el navegador en `http://127.0.0.1:8000`.

## Notas

- Laravel usa Composer para gestionar dependencias PHP.
- `php artisan` es la herramienta de línea de comandos para migraciones, seeders y servidor.
- El archivo `.env` contiene la configuración del entorno y no debe compartirse.
