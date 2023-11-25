<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripciones extends Model
{
    use HasFactory;
    protected $table = 'suscripciones';
    protected $fillable = [
        'membresia',
        'user_id',
        'total',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
