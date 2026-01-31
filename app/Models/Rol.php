<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    // 1. Definir los campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'activo',
    ];

    // 2. Si quieres que 'activo' siempre se trate como booleano (true/false)
    protected $casts = [
        'activo' => 'boolean',
    ];
}
