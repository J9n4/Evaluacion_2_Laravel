<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     * 
     * Ejecutar: php artisan db:seed
     * Resetear y sembrar: php artisan migrate:fresh --seed
     */
    public function run(): void
    {
        // Crear usuario de prueba
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

       
        Categoria::factory(5)
            ->has(Producto::factory(3))
            ->create();

        
        $categoria = Categoria::factory()
            ->withoutDescription()
            ->create([
                'nombre' => 'Desarrollo Web',
            ]);

        
        Producto::factory(2)
            ->inCategory($categoria)
            ->withPrice(99.99)
            ->create();
    }
}
