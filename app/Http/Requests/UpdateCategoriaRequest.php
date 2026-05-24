<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Form Request para actualizar una categoría existente.
 * Diferencia: permite que el nombre sea único EXCEPTO para el registro actual.
 */
class UpdateCategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|min:3|max:100|unique:categorias,nombre,' . $this->categoria->id,
            'descripcion' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.unique' => 'Este nombre ya está en uso por otra categoría.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
        ];
    }
}
