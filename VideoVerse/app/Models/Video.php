<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     * The name of the table associated with the model.
     *
     * @var string
     */
    protected $table = 'videos';

    protected $fillable = [
        'titulo',
        'caminho_video',
        'caminho_imagem',
        'data_postagem',
        'canal_id',
        'categoria'
    ];

    public function canal()
    {
        return $this->belongsTo(Canal::class); 
    }

    public function comments()
    {
        return $this->hasMany(Comentario::class);
    }

    public function likes()
{
    return $this->hasMany(Favorito::class);
}

public function setCategoriasAttribute($value)
{
    $this->attributes['categoria'] = ucwords($value);
}

}