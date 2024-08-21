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
        Schema::create('tipos_usuarios', function (Blueprint $table) {
            $table->tinyInteger('Codtip_usu')->unique('codtip_usu_unique');
            $table->string('Tip_usu', 100)->nullable();

            $table->primary(['Codtip_usu']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_usuarios');
    }
};
