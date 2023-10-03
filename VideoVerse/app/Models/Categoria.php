<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name', // Nome da categoria
    ];
    protected $table = 'categories';
    // Relação com os vídeos que pertencem à categoria
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
