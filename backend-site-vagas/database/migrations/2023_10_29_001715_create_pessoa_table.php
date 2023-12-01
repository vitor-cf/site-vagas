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
        Schema::create('pessoa', function (Blueprint $table) {
            $table->id();
            $table->integer('candidato_id');
            $table->char('nome', 50);
            $table->char('sobrenome', 50);
            $table->decimal('celular', 13);
            $table->char('cidade', 30);
            $table->foreign('candidato_id')->references('id')->on('candidato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoa');
    }
};
