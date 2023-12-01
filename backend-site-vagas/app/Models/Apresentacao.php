<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apresentacao extends Model
{
    use HasFactory;

    protected $table = 'apresentacao';

    protected $fillable = [
        'candidato_id',
        'titulo_perfil',
        'nivel_ingles',
        'descricao',
        'link_linkedin',
        'link_github'
    ];
}
