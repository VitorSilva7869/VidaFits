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
        Schema::create('audios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->text('descricao');
            $table->string('localizacao');
            $table->integer('minutos');
            $table->text('imagem');
            $table->float('avaliacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
