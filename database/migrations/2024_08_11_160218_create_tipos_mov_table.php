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
        Schema::create('tipos_mov', function (Blueprint $table) {
            $table->tinyInteger('Codtipom')->unique('codtipom_unique');
            $table->string('Nomtipomcor', 100)->nullable();
            $table->string('Nomtipolar', 100)->nullable();
            $table->string('Naturaleza', 100)->nullable();

            $table->primary(['Codtipom']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_mov');
    }
};
