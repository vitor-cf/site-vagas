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
        Schema::create('habilidades', function (Blueprint $table) {
            $table->id();
            $table->integer('candidato_id');
            $table->char('foco_carreira', 50);
            $table->enum('nivel_experiencia', ['Junior','Pleno', 'Senior']);
            $table->enum('tecnologias', ['Javascript','PHP', 'Ruby', 'Java']);
            $table->foreign('candidato_id')->references('id')->on('candidato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habilidades');
    }
};
