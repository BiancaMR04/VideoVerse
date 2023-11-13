<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monetizacao extends Model
{
    use HasFactory;

    protected $table = 'monetizacao'; 

    protected $fillable = [
        'nome',
        'user_id',
        'banco',
        'conta',
        'agencia',
        'cpf',
        'canal_id',
        'valor_retirado',
    ];

    public $timestamps = false;

public function user()
    {
        return $this->belongsTo(User::class);
    }
}
