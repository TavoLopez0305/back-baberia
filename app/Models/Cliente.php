<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    // 1. Definir los campos que se pueden llenar masivamente
    protected $fillable = [
        'id_cliente',
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'notas',
    ];
    
}
