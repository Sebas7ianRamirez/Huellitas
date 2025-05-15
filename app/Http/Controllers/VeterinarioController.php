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
}