<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sucursal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sucursal',
        'nombre',
        'direccion',
        'telefono',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}
