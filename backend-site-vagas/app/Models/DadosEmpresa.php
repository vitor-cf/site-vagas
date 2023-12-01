<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosEmpresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'nome_responsavel',
        'cargo_area',
        'numero_celular',
        'website',
        'nome_empresa',
        'cnpj',
        'possui_cnpj',
        'tipo_empresa',
        'descricao_empresa'
    ];
}
