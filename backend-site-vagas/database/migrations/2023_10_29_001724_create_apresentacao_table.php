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
        Schema::create('apresentacao', function (Blueprint $table) {
            $table->id();
            $table->integer('candidato_id');
            $table->char('titulo_perfil', 25);
            $table->enum('nivel_ingles', ['Basico','Intermediario', 'Avancado']);
            $table->text('descricao');
            $table->char('link_linkedin', 50);
            $table->char('link_github', 50);
            $table->foreign('candidato_id')->references('id')->on('candidato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apresentacao');
    }
};
