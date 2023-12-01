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
        Schema::create('dados_empresa', function (Blueprint $table) {
            $table->id();
            $table->integer('usuario_id');
            $table->char('nome_responsavel', 100);
            $table->enum('cargo_area', ['Analista RH','Gerente RH', 'Diretor(a) de RH']);
            $table->integer('numero_celular');
            $table->char('website', 50);
            $table->char('nome_empresa', 50);
            $table->integer('cnpj');
            $table->boolean('possui_cnpj');
            $table->enum('tipo_empresa', ['startup','pequena/media empresa', 'grande empresa']);
            $table->text('descricao_empresa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados_empresa');
    }
};
