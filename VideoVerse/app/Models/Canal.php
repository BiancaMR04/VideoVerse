<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
    use HasFactory;

    protected $table = 'canais'; 

    protected $fillable = [
        'nome',
        'descricao',
        'data_de_cadastro',
        'categorias',
        'inscritos',
    ];

}
