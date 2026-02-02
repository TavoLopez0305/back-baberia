<?php

namespace App\Http\Controllers;

use App\Services\ProductoService;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{

    protected ProductoService $productoService;
    
    public function __construct(ProductoService $productoService){
        $this->productoService = $productoService;
    }


    public function index(Request $request){

        try {
            $productos = $this->productoService->obtenerProductos($request->all());
            return ApiResponse::success(
                'productos obtenidos corectamente',
                $productos,
            );
        } catch (\Throwable $th) {
            Log::error('Error al obtener productos', [
                'exception' => $th
            ]);
           return ApiResponse::error(
            'Error al obtener los productos',
            500
        );

        }
    }

    public function show (string  $id_producto){
        try {
            $producto = $this->productoService->obtenerProducto($id_producto);
            if(!$producto){
                return ApiResponse::error(
                    'Producto no encontrado',
                    500
                );
            }
            return ApiResponse::success(
                'Producto encontrado',
                $producto
            );

        } catch (\Throwable $th) {
            log::error( 'error al buscar el producto',[
                'exception' => $th
            ]);
            return ApiResponse::error(
                'Error al buscar el producto',
                500
            );
        }
    }
    public function store(Request $request){
        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:150',
                'descripcion' => 'nullable|string|max:250',
                'precio' => 'required|numeric',
                'moneda' => 'required|string|max:5',
                'imagen_url' => 'nullable|string',
            ]);
            $producto = $this->productoService->crearProducto($data);
            
            if(!$producto){
                return ApiResponse::error('producto no creado',404);
            }
            
            return ApiResponse::success(
                'Producto creado correctamente',
                $producto
            );

        } catch (\Throwable $th) {
            Log::error('error al crear el producto',[
                'exception' => $th
            ]);
            return ApiResponse::error(
                'error al crear el producto',
                500
            );
        }
    }

    public function update(Request $request, string $id_producto){
        try {
            $producto = $this->productoService->actualizarproducto($id_producto, $request->all());
            // cuando regesa en null
            if (!$producto) {
                return ApiResponse::error(
                    'producto no encontrado',
                    404
                );
            }

            return ApiResponse::success(
                'Datos actualizados correctamente',
                    $producto
                );

        } catch (\Throwable $th) {
            Log::error('Error al actualizar producto', [
                'exception' => $th
            ]);
            return ApiResponse::error(
                'Error al actualizar los datos',
                500
            );
        }

    }

    public function destroy(string $id_producto){
        try {
            $producto = $this->productoService->deshabilitarProducto($id_producto);
            // cuando regesa en null
            if (!$producto) {
                return ApiResponse::error(
                    'producto no encontrado',
                    404
                );
            }

            return ApiResponse::success(
                'producto deshabilitado correctamente',
                    $producto
                );

        } catch (\Throwable $th) {
            Log::error('Error al deshabilitado producto', [
                'exception' => $th
            ]);
            return ApiResponse::error(
                'Error al deshabilitado producto',
                500
            );
        }
    }
}
