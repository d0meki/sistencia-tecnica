<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table = 'vehiculos';
    protected $fillable = [
        'marca',
        'modelo',
        'placa',
        'color',
        'foto',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
