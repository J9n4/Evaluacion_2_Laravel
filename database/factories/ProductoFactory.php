<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define el estado por defecto de la fábrica.
     */
    public function definition(): array
    {
        return [
            'categoria_id' => Categoria::factory(),
            'titulo' => $this->faker->words(3, true),
            'precio' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }

    /**
     * Variante: Producto con precio específico
     */
    public function withPrice(float $price): static
    {
        return $this->state(fn (array $attributes) => [
            'precio' => $price,
        ]);
    }

    /**
     * Variante: Producto en categoría específica
     */
    public function inCategory(Categoria $categoria): static
    {
        return $this->state(fn (array $attributes) => [
            'categoria_id' => $categoria->id,
        ]);
    }
}
