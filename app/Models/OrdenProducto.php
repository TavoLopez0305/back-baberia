<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrdenProducto extends Model
{
 use HasFactory;

    protected $table = 'orden_productos';

    protected $fillable = [
        'id_orden',
        'id_producto',
        'nombre_producto',
        'precio',
        'cantidad',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'id_orden');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
