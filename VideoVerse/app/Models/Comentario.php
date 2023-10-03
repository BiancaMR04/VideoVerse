<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'user_id', // ID do usuário que fez o comentário
        'video_id', // ID do vídeo associado ao comentário
        'body', // Texto do comentário
    ];

    // Relação com o usuário que fez o comentário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relação com o vídeo associado ao comentário
    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
