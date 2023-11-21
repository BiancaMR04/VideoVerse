<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;
    protected $table = 'denuncias'; 

    protected $fillable = [
        'id_video',
        'denuncia',
        'outro',
        'data_denuncia',
        'status',
    ];

    public $timestamps = false;

public function user()
    {
        return $this->belongsTo(User::class);
    }
}