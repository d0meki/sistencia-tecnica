<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulaciones extends Model
{
    use HasFactory;
    protected $table = 'postulaciones';
    protected $fillable = [
        'solicitud_id',
        'tecnico_id',
        'taller_id',
        'estimacion_llegada',
        'estimacion_costo',
        'estado',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function solicitud(){
        return $this->belongsTo(Solicitudes::class);
    }
}
