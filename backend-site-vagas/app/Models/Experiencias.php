<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencias extends Model
{
    use HasFactory;

    protected $table = 'experiencias';

    protected $fillable = [
        'candidato_id',
        'nome_empresa',
        'cargo',
        'data_inicio',
        'data_fim',
        'trabalho_atual',
        'descricao'
    ];
}
