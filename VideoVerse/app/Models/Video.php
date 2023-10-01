<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos'; 

    protected $fillable = [
        'titulo',
        'descricao',
        'categorias',
        'id_usuario',
        'data',
        'caminho',
        'caminho_imagem',
        'visualizacao',
        
    ];

    public $timestamps = false;
}