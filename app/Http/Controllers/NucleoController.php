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

        $categoriasAll = Categoria::with('productos')->get();

        return view('nucleos.nt4', compact('categoriasAll'));
    }

    public function storeCategoria(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'descripcion' => 'nullable|string|max:255',
        ]);

        Categoria::create($data);

        return redirect()->route('nt4')->with('success', 'Categoría creada correctamente.');
    }

    public function editCategoria(Categoria $categoria)
    {
        return view('nucleos.nt4-edit', compact('categoria'));
    }

    public function updateCategoria(Request $request, Categoria $categoria)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $categoria->update($data);

        return redirect()->route('nt4')->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroyCategoria(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('nt4')->with('success', 'Categoría eliminada correctamente.');
    }

    public function storeProducto(Request $request)
    {
        $data = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'titulo' => 'required|string|min:3|max:150',
            'precio' => 'required|numeric|min:0',
        ]);

        Producto::create($data);

        return redirect()->route('nt4')->with('success', 'Producto agregado a la categoría correctamente.');
    }

    public function destroyProducto(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('nt4')->with('success', 'Producto eliminado correctamente.');
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
