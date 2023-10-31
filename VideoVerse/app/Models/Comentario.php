<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comments';
    use HasFactory; 
    protected $fillable = [
        'user_id', 
        'video_id', 
        'body', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function canal()
    {
        return $this->belongsTo(Canal::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

}
