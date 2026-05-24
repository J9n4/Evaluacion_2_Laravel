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

## SQL: Crear tablas y poblar datos de prueba (MySQL)

```sql
CREATE TABLE IF NOT EXISTS `categorias` (
	`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`nombre` VARCHAR(255) NOT NULL,
	`descripcion` TEXT NULL,
	`created_at` TIMESTAMP NULL,
	`updated_at` TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `productos` (
	`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`categoria_id` BIGINT UNSIGNED NOT NULL,
	`titulo` VARCHAR(255) NOT NULL,
	`precio` DECIMAL(8,2) NOT NULL DEFAULT 0.00,
	`created_at` TIMESTAMP NULL,
	`updated_at` TIMESTAMP NULL,
	CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categorias` (`id`,`nombre`,`descripcion`,`created_at`,`updated_at`) VALUES
(1,'Desarrollo Web','Cursos y proyectos con Laravel y bases de datos relacionales',NOW(),NOW()),
(2,'Bases de Datos','Ejercicios y ejemplos de SQL',NOW(),NOW()),
(3,'Testing','Pruebas y PHPUnit',NOW(),NOW());

INSERT INTO `productos` (`categoria_id`,`titulo`,`precio`,`created_at`,`updated_at`) VALUES
(1,'Manual Laravel 12',0.00,NOW(),NOW()),
(1,'Curso Laravel Avanzado',199.99,NOW(),NOW()),
(2,'Introducción a SQL',29.99,NOW(),NOW());

```

### Ejecutar este bloque SQL

1) Usando el cliente `mysql` (línea de comandos)

Guarda el SQL en un archivo, por ejemplo `nt4_seed.sql`, y luego ejecuta:

```bash
# (opcional) crear la base de datos si no existe
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS nombre_basedatos CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Importar el archivo SQL en la base de datos
mysql -u usuario -p nombre_basedatos < nt4_seed.sql

# Alternativa: entrar al cliente y usar SOURCE
mysql -u usuario -p nombre_basedatos
mysql> SOURCE /ruta/al/nt4_seed.sql;
```

2) Usando phpMyAdmin

- Accede a phpMyAdmin en tu navegador e inicia sesión.
- Selecciona la base de datos `nombre_basedatos` en la columna izquierda (o créala desde el panel "Bases de datos").
- Ve a la pestaña "SQL" y pega el contenido del bloque SQL, o utiliza la pestaña "Importar" y sube el archivo `nt4_seed.sql`.
- Ejecuta la consulta/importación. phpMyAdmin mostrará mensajes de éxito o errores.

Nota: si truncas tablas manualmente recuerda desactivar y reactivar `FOREIGN_KEY_CHECKS` como se muestra arriba.

## Notas

- Laravel usa Composer para gestionar dependencias PHP.
- `php artisan` es la herramienta de línea de comandos para migraciones, seeders y servidor.
- El archivo `.env` contiene la configuración del entorno y no debe compartirse.

# Evidencia Visual 

- Nucleo Tematico 1
![alt text](image.png)

Usando la otra opcion
![alt text](image-1.png)

- Nucleo Tematico 2
![alt text](image-2.png)

Poniendo otra Ruta
![alt text](image-3.png)

- Nucleo Tematico 3
![alt text](image-4.png)

Poniendo en desactivado
![alt text](image-5.png)

- Nucleo Tematico 4
Creando categoria de prueba
![alt text](image-6.png)

Eliminando Categoria
![alt text](image-7.png)

Producto añadido
![alt text](image-8.png)

Producto Eliminado
![alt text](image-9.png)

- Nucleo Tematico 5
Validacion de formulario
![alt text](image-10.png)

Probando Errores de validacion
![alt text](image-11.png)


## Pruebas por Núcleo Temático

Abajo se resumen las pruebas realizadas por núcleo, qué se probó y el resultado observado. Las imágenes referenciadas están en la raíz del proyecto.

### Núcleo 1 — Introducción y Fundamentos
- Imagen: ![NT1 prueba](image-1.png)
- Qué se probó: arranque del servidor (`php artisan serve`), instalación de dependencias con `composer install` y ejecución de migraciones.
- Resultado observado: servidor accesible en `http://127.0.0.1:8000`, `composer install` completó sin errores y `php artisan migrate` creó las tablas apropiadas si `.env` estaba configurado.

### Núcleo 2 — Rutas, Controladores y Middleware
- Imagen: ![NT2 prueba](image-2.png)
- Qué se probó: envío de parámetros en rutas (simulador), protección de rutas con `middleware('auth')` y manejo de redirecciones 302.
- Resultado observado: parámetros capturados y codificados correctamente; rutas protegidas redirigieron a login cuando no había sesión.

### Núcleo 3 — Vistas y Blade Templates
- Imagen: ![NT3 prueba](image-3.png)
- Qué se probó: compilación de directivas Blade (ej. `@if`), escapado de variables y herencia de layouts.
- Resultado observado: HTML compilado correcto (`<p>Servidor Activo</p>` en el ejemplo); contenido HTML en variables fue escapado por `{{ }}` evitando inyección.

### Núcleo 4 — CRUD con Eloquent ORM
- Imagen: ![NT4 prueba](image-4.png)
- Qué se probó: creación y edición de `Categoria`, creación de `Producto`, validaciones del formulario y eliminación en cascada.
- Resultado observado: categorías y productos insertados (datos visibles en la tabla), validaciones (`required`, `exists`) mostraron errores en la vista cuando correspondía; al borrar una categoría sus productos fueron eliminados por `ON DELETE CASCADE`.

### Núcleo 5 — Formularios y Validaciones
- Imagen: ![NT5 prueba](image-5.png)
- Qué se probó: protección CSRF, validación con `$request->validate()` y mensajes de error en la vista (`@error` y `$errors->any()`).
- Resultado observado: envío sin `@csrf` devolvió error 419; reglas `email`, `required`, `min` y `confirmed` activaron mensajes de error y datos válidos mostraron `session('success')`.

Si quieres que suba capturas específicas en otras ubicaciones o que cambie nombres/orden de las imágenes, dímelo y lo ajusto.