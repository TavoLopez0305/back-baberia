<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
use HasFactory;

    protected $fillable = [
        'id_orden',
        'id_cliente',
        'id_usuario',
        'estado',
        'total',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function usuario()
    {
        return $this->belongsTo(user::class, 'id_usuario');
    }
}
