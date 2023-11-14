<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UsuarioRole extends Model
{
    use HasFactory;
    protected $table = 'usuario_roles';
    protected $fillable = [
        'user_id',
        'rol_id'
    ];
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class,'rol_id');
    }
}
