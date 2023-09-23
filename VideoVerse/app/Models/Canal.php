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
        'data_de_cadastro',
        'categorias',
        'inscritos',
        'imagem_foto',
        'imagem_fundo',
        'ativo',
        
    ];

    public $timestamps = false;
}
