<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Form Request para crear una nueva categoría.
 * Centraliza la validación fuera del controlador.
 * Ventajas: código limpio, reutilizable, fácil de mantener
 */
class StoreCategoriaRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta petición
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación
     * Si falla, Laravel automáticamente redirecciona con errores en $errors
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|min:3|max:100|unique:categorias,nombre',
            'descripcion' => 'nullable|string|max:255',
        ];
    }

    /**
     * Mensajes personalizados de error (opcional)
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.unique' => 'Esta categoría ya existe en la base de datos.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max' => 'El nombre no debe exceder 100 caracteres.',
            'descripcion.max' => 'La descripción no debe exceder 255 caracteres.',
        ];
    }
}
