<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    use HasFactory;
    protected $table = 'solicitudes';
    protected $fillable = [
        'user_id',
        'estado',
        'nota_audio',
        'hora',
        'fecha',
        'latitud',
        'longitud',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function fotografias()
    {
        return $this->hasMany(fotografia::class, 'solicitud_id');
    }
}
