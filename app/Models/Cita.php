<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cita extends Model
{
  use HasFactory;

    protected $fillable = [
        'id_cita',
        'id_cliente',
        'id_sucursal',
        'id_cita_reagendada',
        'fecha_hora',
        'fecha_hora_reagenda',
        'estado',
        'notas',
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
        'fecha_hora_reagenda' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal');
    }

    // Cita original
    public function citaOriginal()
    {
        return $this->belongsTo(Cita::class, 'id_cita_reagendada');
    }

    // Citas derivadas
    public function citasReagendadas()
    {
        return $this->hasMany(Cita::class, 'id_cita_reagendada');
    }
}
