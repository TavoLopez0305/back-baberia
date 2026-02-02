<?php

namespace App\Services;

use App\Models\Sucursal;
use Illuminate\Support\Str;

class SucursalService
{
    public function obtenerSucursales(array $filtros)
    {
        $query = Sucursal::query();

        if (!empty($filtros['nombre'])) {
            $query->where('nombre', 'like', '%' . $filtros['nombre'] . '%');
        }

        return $query->paginate(15);
    }

    public function obtenerSucursal(string $id_sucursal)
    {
        return $this->getSucursal($id_sucursal);
    }

    public function crearSucursal(array $datos)
    {
        $id_sucursal = 'SUC-' . Str::upper(Str::slug($datos['nombre']));
        $datos['id_sucursal'] = $id_sucursal;
        $datos['activo'] = true;

        return Sucursal::create($datos);
    }

    public function actualizarSucursal(string $id_sucursal, array $datos)
    {
        $sucursal = $this->getSucursal($id_sucursal);

        if (!$sucursal) {
            return null;
        }

        if (!empty($datos['nombre'])) {
            $sucursal->nombre = $datos['nombre'];
        }

        if (!empty($datos['direccion'])) {
            $sucursal->direccion = $datos['direccion'];
        }

        if (!empty($datos['telefono'])) {
            $sucursal->telefono = $datos['telefono'];
        }

        $sucursal->save();

        return $sucursal;
    }

    public function deshabilitarSucursal(string $id_sucursal)
    {
        $sucursal = $this->getSucursal($id_sucursal);

        if (!$sucursal) {
            return null;
        }

        $sucursal->activo = false;
        $sucursal->save();

        return $sucursal;
    }

    // Helper interno
    protected function getSucursal(string $id_sucursal)
    {
        $sucursal = Sucursal::where('id_sucursal', $id_sucursal)->first();

        if (!$sucursal || !$sucursal->activo) {
            return null;
        }

        return $sucursal;
    }
}
