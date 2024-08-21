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
        Schema::create('tipos_documentos', function (Blueprint $table) {
            $table->tinyInteger('Codtip_doc')->unique('codtip_doc_unique');
            $table->string('Tip_doc', 100)->nullable();

            $table->primary(['Codtip_doc']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_documentos');
    }
};
