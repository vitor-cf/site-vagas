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
        Schema::create('experiencias', function (Blueprint $table) {
            $table->id();
            $table->integer('candidato_id');
            $table->char('nome_empresa', 50);
            $table->char('cargo', 30);
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->boolean('trabalho_atual');
            $table->text('descricao');
            $table->foreign('candidato_id')->references('id')->on('candidato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencias');
    }
};
