<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Donacion;

class AdminController extends Controller
{
    /**
     * Muestra el dashboard de administrador:
     * - Inventario (solo productos activos)
     * - Donaciones pendientes
     */
    public function index()
    {
        // Solo los productos activos
        $productos = Producto::where('activo', true)->get();

        // Donaciones que aún no se han atendido
        $donaciones = Donacion::where('estado', 'sin atender')
                              ->orderBy('created_at', 'desc')
                              ->get();

        return view('AdminViews.admin', compact('productos','donaciones'));
    }

    /**
     * Marca una donación como atendida (vía AJAX)
     */
    public function marcarAtendida(Request $request, Donacion $donacion)
    {
        $donacion->estado = 'atendida';
        $donacion->save();

        return response()->json(['success' => true]);
    }

    /**
     * Actualiza el stock de varios productos
     */
    public function actualizarStock(Request $request)
    {
        $data = $request->validate([
            'stock_actual'   => 'required|array',
            'stock_actual.*' => 'required|integer|min:0',
        ]);

        foreach ($data['stock_actual'] as $id => $stock) {
            if ($p = Producto::find($id)) {
                $p->stock_actual = $stock;
                $p->save();
            }
        }

        return back()->with('success','Stock actualizado correctamente.');
    }
}
