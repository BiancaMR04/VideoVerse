<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
    use HasFactory;

    protected $table = 'canal'; 

    protected $fillable = [
        'nome',
        'descricao',
        'data_criacao_canal', // Nome da coluna correta no banco de dados
        'categorias',
        'inscritos',
        'imagem_perfil', // Nome da coluna correta no banco de dados
        'imagem_fundo',
    ];
    

}
