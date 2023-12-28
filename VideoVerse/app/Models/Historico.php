<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;
    protected $table = 'video_history';
    protected $fillable = ['video_id', 'user_id'];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
