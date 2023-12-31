<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**

     * Indica se o modelo deve registrar automaticamente as datas de criação e atualização.
     *
     * @var bool
     */
    public $timestamps = false; // Desabilita as colunas created_at e updated_at

    /**
     * O formato de data personalizado para a coluna data_de_cadastro.
     *
     * @var string
     */
    protected $dateFormat = 'd-m-Y'; // Define o formato de data da coluna data_de_cadastro

    /**
     * The name of the table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**

     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'date_of_birth',
        'adm',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'timestamp',
        'password' => 'hashed',
        'adm' => 'boolean',
    ];

    public function comments()
    {
        return $this->hasMany(Comentario::class);
    }

    public function likedVideos()
    {
        return $this->belongsToMany(Video::class, 'favorites', 'user_id', 'video_id');
    }

    public function subscribedChannels()
    {
        return $this->belongsToMany(Canal::class, 'followers', 'user_id', 'canal_id');
    }

    public function videos() {
        return $this->hasMany(Video::class);
    }
    
    public function canal()
    {
        return $this->hasOne(Canal::class);
    }

    public function adm() {
        return $this->adm;
    }
    
    protected $attributes = [
        'adm' => false, 
    ];

    public function historico()
    {
        return $this->hasMany(Historico::class);
    }

}
