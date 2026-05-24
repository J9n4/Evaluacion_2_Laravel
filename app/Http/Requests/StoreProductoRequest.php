<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Form Request para crear un nuevo producto.
 * Aplica reglas de validación centralizadas.
 */
class StoreProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'categoria_id' => 'required|exists:categorias,id',
            'titulo' => 'required|string|min:3|max:150',
            'precio' => 'required|numeric|min:0|max:999999.99',
        ];
    }

    public function messages(): array
    {
        return [
            'categoria_id.required' => 'Debes seleccionar una categoría.',
            'categoria_id.exists' => 'La categoría seleccionada no existe.',
            'titulo.required' => 'El título del producto es obligatorio.',
            'titulo.min' => 'El título debe tener al menos 3 caracteres.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',
        ];
    }
}
