<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnicos extends Model
{
    use HasFactory;
    protected $table = 'tecnicos';
    protected $fillable = [
        'taller_id',
        'user_id',
        'longitud',
        'latitud',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
