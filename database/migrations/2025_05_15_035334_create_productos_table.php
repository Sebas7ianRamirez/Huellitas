<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('categoria', ['Alimentacion', 'Medicamentos', 'Aseo']);
            $table->string('unidad_medida');
            $table->integer('stock_actual')->default(0);
            $table->integer('stock_minimo');
            $table->text('descripcion')->nullable();
            $table->date('fecha_ingreso');
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
