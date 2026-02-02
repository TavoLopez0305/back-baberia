<?php

namespace App\Services;

use App\Models\Producto;
use Illuminate\Support\Str;
class ProductoService
{
    public function obtenerProductos(array $filtros)
    {
        $query = Producto::query();

        // 🔍 Filtro por nombre (LIKE)
        if (!empty($filtros['nombre'])) {
            $query->where('nombre', 'like', '%' . $filtros['nombre'] . '%');
        }

        // 🎭 Filtro por moneda
        if (!empty($filtros['monedas']) && is_array($filtros['monedas'])) {
            $query->whereIn('moneda', $filtros['monedas']);
        }

        // 📅 Fecha creación desde
        if (!empty($filtros['precio_init'])) {
            $query->where('precio', '>=', $filtros['precio_init']);
        }

        // 📅 Fecha creación hasta
        if (!empty($filtros['precio_end'])) {
            $query->whereDate('precio', '<=', $filtros['precio_end']);
        }

        // 📄 Paginación
        return $query->paginate(15);
    }

    public function obtenerProducto( string $id_producto){
        return $this->getProducto($id_producto);
    }

    public function crearProducto(array $datos){
        
        $id_producto = 'PRO' . Str::upper($datos['nombre']);
        $verificar_existencia = $this->getProducto($id_producto);
        
        if($verificar_existencia){
            return null;
        }
        $datos['id_producto'] = $id_producto;
        
        return Producto::create($datos);
    }

    public function actualizarproducto(string $id_producto , array $datos){

        $producto = $this->getProducto($id_producto);

        if(!$producto){
            return null;
        }

        if (!empty($datos['nombre'])) {
            $producto->nombre = $datos['nombre'];
        }

        if (!empty($datos['descripcion'])) {
            $producto->descripcion  = $datos['descripcion'];
        }

        if (!empty($datos['precio'])) {
            $producto->precio = $datos['precio'];
        }

        if (!empty($datos['moneda'])) {
            $producto->moneda = $datos['moneda'];
        }

        if (!empty($datos['imagen_url'])) {
            $producto->imagen_url = $datos['imagen_url'];
        }

        $producto->save();
        return $producto;
    }

    public function deshabilitarProducto(string $id_producto){

        $producto = $this->getProducto($id_producto);

        if(!$producto){
            return null;
        }
        $producto->activo = false;
        $producto->save();

        return $producto;
    }

    // helpers

    protected function getProducto( string $id_producto){
        $producto = Producto::where('id_producto', $id_producto)->first();
        
        if(!$producto){
            return null;
        }
        if(!$producto->activo){
            return null;
        }

        return $producto;
    }
}
