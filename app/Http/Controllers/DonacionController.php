<?php

namespace App\Http\Controllers;

use App\Models\Donacion;
use App\Models\Producto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonacionController extends Controller
{
    //
    // Mostrar formulario de donación
    public function create()
    {
        $categories = ['Alimentacion', 'Medicamentos', 'Aseo'];
        return view('donations.create', compact('categories'));
    }

    // Guardar donación
    public function store(Request $request)
    {
        $request->validate([
            'nombre_donante' => 'required|string|max:255',
            'celular' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'categoria' => 'required|in:Alimentacion,Medicamentos,Aseo',
            'cantidad' => 'required|integer|min:1',
            'descripcion' => 'nullable|string',
        ]);

        Donacion::create($request->all());

        return redirect()->back()->with('success', 'Gracias por tu donación! Nos pondremos en contacto contigo');
    }

    /** Mostrar página de inicio con gráficas y formulario de donación */
    public function inicio()
    {
        $categories = ['Alimentacion', 'Medicamentos', 'Aseo'];

        $topAlto = Producto::orderBy('stock_actual', 'desc')
            ->take(3)
            ->get(['nombre', 'stock_actual']);

        $topBajo = Producto::orderBy('stock_actual', 'asc')
            ->take(3)
            ->get(['nombre', 'stock_actual']);

        return view('InicioViews.inicio', compact('categories', 'topAlto', 'topBajo'));
    }

    /* CONTROLA EL ESTADO DE LAS DONACIONES */

    public function marcarAtendida(Donacion $donacion)
    {
        $donacion->estado = 'atendida';
        $donacion->save();

        return response()->json(['success' => true]);
    }
}
