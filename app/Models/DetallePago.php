<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePago extends Model
{
    use HasFactory;
    protected $table = 'detalle_pagos';
    protected $fillable = [
        'detalle',
        'precio',
        'pago_id',
    ];
}
