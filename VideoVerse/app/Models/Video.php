<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'caminho_video',
        'caminho_imagem',
        'data_postagem',
    ];
    
    public function canal()
    {
        return $this->belongsTo(Canal::class, 'id_canal');
    }
}
