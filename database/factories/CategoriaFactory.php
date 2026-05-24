<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define el estado por defecto de la fábrica.
     * Genera datos falsados realistas para pruebas.
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->words(2, true),
            'descripcion' => $this->faker->sentence(10),
        ];
    }

    /**
     * Variante: Categoria sin descripción
     */
    public function withoutDescription(): static
    {
        return $this->state(fn (array $attributes) => [
            'descripcion' => null,
        ]);
    }
}
