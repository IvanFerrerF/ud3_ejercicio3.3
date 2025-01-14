<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('perfiles', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('usuario_id')->unique(); // Cada perfil pertenece a un solo usuario
        $table->text('biografia')->nullable();
        $table->timestamps();
    
        // Clave foránea
        $table->foreign('usuario_id')->references('id')->on('alumnos')->onDelete('cascade');
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};
