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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->tinyInteger('Codtransaccion')->unique('codtransaccion_unique');
            $table->date('Fecha')->nullable();
            $table->float('Valor')->nullable();
            $table->text('Descrip')->nullable();
            $table->tinyInteger('Tip_med')->index('fktransacciones_tipos_medios');
            $table->tinyInteger('Tiposmov')->index('fktransacciones_tipos_mov');
            $table->tinyInteger('Codcuenta')->index('fktransacciones_cuentas');

            $table->primary(['Codtransaccion']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};
