<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoa';

    protected $fillable = [
        'candidato_id',
        'nome',
        'sobrenome',
        'celular',
        'cidade'
    ];
}
