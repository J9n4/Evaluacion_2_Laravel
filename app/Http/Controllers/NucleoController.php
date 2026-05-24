<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NucleoController extends Controller
{
    public function nt4()
    {
        if (!Categoria::exists()) {
            $categoria = Categoria::create([
                'nombre' => 'Desarrollo Web',
                'descripcion' => 'Cursos y proyectos con Laravel y bases de datos relacionales.',
            ]);

            Producto::create([
                'categoria_id' => $categoria->id,
                'titulo' => 'Manual Laravel 12',
                'precio' => 0,
            ]);
        }

        $categoriasAll = Categoria::all();
        $categoriasWithProductos = Categoria::with('productos')->get();

        return view('nucleos.nt4', compact('categoriasAll', 'categoriasWithProductos'));
    }

    public function nt5()
    {
        return view('nucleos.nt5');
    }

    public function validarNt5(Request $request)
    {
        $datosValidados = $request->validate([
            'nombre' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        return redirect()->route('nt5')
            ->with('success', 'Validación aprobada. Los datos están listos para crearse.')
            ->with('validated', $datosValidados);
    }
}
