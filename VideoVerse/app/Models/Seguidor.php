<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguidor extends Model
{
    protected $table = 'followers'; 

    protected $fillable = [
        'user_id', 
        'canal_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function canal()
    {
        return $this->belongsTo(Canal::class, 'canal_id');
    }
}
