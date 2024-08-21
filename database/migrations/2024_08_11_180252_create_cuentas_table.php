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
        Schema::create('cuentas', function (Blueprint $table) {
            $table->tinyInteger('Codcuenta')->unique('codcuenta_unique');
            $table->date('Fechacre')->nullable();
            $table->bigInteger('Usuario');
            $table->text('Descrip')->nullable();
            $table->bigInteger('usuarios_Ndocum')->index('fk_cuentas_users');

            $table->primary(['Codcuenta', 'usuarios_Ndocum']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};
