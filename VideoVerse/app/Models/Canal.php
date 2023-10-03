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
        'imagem_perfil',
        'imagem_fundo',
        'ativo',
        'user_id'
    ];

    public $timestamps = false;

    public function videos()
    {
        return $this->hasMany(Video::class); 
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
