<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnicos extends Model
{
    use HasFactory;
    protected $table = 'tecnicos';
    protected $fillable = [
        'talleres_mecanicos_id',
        'user_id',
        'longitud',
        'estado',
        'latitud',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
