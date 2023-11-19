<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalleresMecanicos extends Model
{
    use HasFactory;
    protected $table = 'talleres_mecanicos';
    protected $fillable = [
        'nombre',
        'nit',
        'direccion',
        'telefono',
        'foto',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tecnicos()
    {
        return $this->hasMany(Tecnicos::class);
    }
}
