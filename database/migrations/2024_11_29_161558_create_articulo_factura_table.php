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
        Schema::create('articulo_factura', function (Blueprint $table) {
            $table->foreignId('articulo_id')->constrained();
            $table->foreignId('factura_id')->constrained()->onDelete('cascade');
            $table->primary(['factura_id', 'articulo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulo_factura');
    }
};
