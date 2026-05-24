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
-- Crear tabla categorias
CREATE TABLE IF NOT EXISTS `categorias` (
	`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`nombre` VARCHAR(255) NOT NULL,
	`descripcion` TEXT NULL,
	`created_at` TIMESTAMP NULL,
	`updated_at` TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear tabla productos
CREATE TABLE IF NOT EXISTS `productos` (
	`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`categoria_id` BIGINT UNSIGNED NOT NULL,
	`titulo` VARCHAR(255) NOT NULL,
	`precio` DECIMAL(8,2) NOT NULL DEFAULT 0.00,
	`created_at` TIMESTAMP NULL,
	`updated_at` TIMESTAMP NULL,
	CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos de prueba (IDs fijos para ejemplo)
INSERT INTO `categorias` (`id`,`nombre`,`descripcion`,`created_at`,`updated_at`) VALUES
(1,'Desarrollo Web','Cursos y proyectos con Laravel y bases de datos relacionales',NOW(),NOW()),
(2,'Bases de Datos','Ejercicios y ejemplos de SQL',NOW(),NOW()),
(3,'Testing','Pruebas y PHPUnit',NOW(),NOW());

INSERT INTO `productos` (`categoria_id`,`titulo`,`precio`,`created_at`,`updated_at`) VALUES
(1,'Manual Laravel 12',0.00,NOW(),NOW()),
(1,'Curso Laravel Avanzado',199.99,NOW(),NOW()),
(2,'Introducción a SQL',29.99,NOW(),NOW());

-- Si ejecutas en una BD con datos previos, puedes truncar las tablas primero:
-- SET FOREIGN_KEY_CHECKS=0;
-- TRUNCATE TABLE productos;
-- TRUNCATE TABLE categorias;
-- SET FOREIGN_KEY_CHECKS=1;
```

## Notas

- Laravel usa Composer para gestionar dependencias PHP.
- `php artisan` es la herramienta de línea de comandos para migraciones, seeders y servidor.
- El archivo `.env` contiene la configuración del entorno y no debe compartirse.
