<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = 'productos';
    
    protected $fillable = [
        'nombre',
        'categoria',
        'unidad_medida',
        'stock_actual',
        'stock_minimo',
        'descripcion',
        'fecha_ingreso',
        'activo'
    ];

    protected $casts = [
        'fecha_ingreso' => 'date',
        'activo' => 'boolean'
    ];
    
    protected $dates = ['deleted_at'];
}