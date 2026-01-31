<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pago',
        'id_orden',
        'id_sucursal',
        'monto',
        'metodo',
        'estado',
        'referencia',
    ];

    protected $casts = [
        'monto' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */

    // Orden a la que pertenece el pago
    public function orden()
    {
        return $this->belongsTo(Orden::class, 'id_orden');
    }

    // Sucursal donde se realizó el pago (punto de cobro)
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal');
    }
}
