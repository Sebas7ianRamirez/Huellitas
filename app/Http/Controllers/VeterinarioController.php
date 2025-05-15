<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Donacion;

class VeterinarioController extends Controller
{
    public function index()
    {
        $productos = Producto::where('activo', true)->get();
        $donaciones = Donacion::orderBy('created_at', 'desc')->take(10)->get();

        return view('VeterinarioViews.veterinario', compact('productos', 'donaciones'));
    }

    public function inventario()
    {
        $productos = Producto::all();
        $categorias = Producto::distinct()->pluck('categoria');
        return view('VeterinarioViews.inventario', compact('productos', 'categorias'));
    }

    public function toggleActivo($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->activo = !$producto->activo;
        $producto->save();

        return response()->json(['success' => true]);
    }

    /* TODO LO QUE SE ENCARGA DE CONTROLAR LA VISTA DE PRODUCTOS */

    public function productos()
    {
        // Todos los productos para la tabla
        $productos = Producto::all();
        // Las categorías para el <select>
        $categorias = Producto::distinct()->pluck('categoria');

        return view('VeterinarioViews.productos', compact('productos', 'categorias'));
    }

    public function storeProducto(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|in:Alimentacion,Medicamentos,Aseo',
            'unidad_medida' => 'required|string|max:50',
            'stock_actual' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
        ]);

        Producto::create(
            array_merge($data, [
                'fecha_ingreso' => now()->toDateString(),
                'activo' => true,
            ]),
        );

        return redirect()->route('Productos')->with('success', 'Producto agregado.');
    }

    /* CONTROLADOR QUE PERMITE ACTUALIZAR EL STOCK */
    public function actualizarStock(Request $request)
    {
        $data = $request->validate([
            'stock_actual' => 'required|array',
            'stock_actual.*' => 'required|integer|min:0',
        ]);

        foreach ($data['stock_actual'] as $productoId => $nuevoStock) {
            $producto = Producto::find($productoId);
            if ($producto) {
                $producto->stock_actual = $nuevoStock;
                $producto->save();
            }
        }

        return redirect()->back()->with('success', 'Stock actualizado correctamente.');
    }
}
