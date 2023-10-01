<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // ID do usuário que marcou como favorito
        'video_id', // ID do vídeo marcado como favorito
    ];

    // Relação com o usuário que marcou como favorito
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relação com o vídeo marcado como favorito
    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
