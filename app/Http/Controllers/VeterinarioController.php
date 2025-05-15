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
}
