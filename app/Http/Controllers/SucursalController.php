<?php

namespace App\Http\Controllers;

use App\Services\SucursalService;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Log;

class SucursalController extends Controller
{
    protected SucursalService $sucursalService;

    public function __construct(SucursalService $sucursalService)
    {
        $this->sucursalService = $sucursalService;
    }

    public function index(Request $request)
    {
        try {
            $sucursales = $this->sucursalService->obtenerSucursales($request->all());

            return ApiResponse::success(
                'Sucursales obtenidas correctamente',
                $sucursales
            );

        } catch (\Throwable $th) {

            Log::error('Error al obtener sucursales', [
                'exception' => $th
            ]);

            return ApiResponse::error(
                'Error al obtener sucursales',
                500
            );
        }
    }

    public function show(string $id)
    {
        try {
            $sucursal = $this->sucursalService->obtenerSucursal($id);

            if (!$sucursal) {
                return ApiResponse::error(
                    'Sucursal no encontrada',
                    404
                );
            }

            return ApiResponse::success(
                'Sucursal encontrada',
                $sucursal
            );

        } catch (\Throwable $th) {

            Log::error('Error al obtener sucursal', [
                'exception' => $th
            ]);

            return ApiResponse::error(
                'Error al obtener sucursal',
                500
            );
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:150',
                'direccion' => 'required|string|max:255',
                'telefono' => 'required|string|max:30',
            ]);

            $sucursal = $this->sucursalService->crearSucursal($data);

            return ApiResponse::success(
                'Sucursal creada correctamente',
                $sucursal
            );

        } catch (\Throwable $th) {

            Log::error('Error al crear sucursal', [
                'exception' => $th
            ]);

            return ApiResponse::error(
                'Error al crear sucursal',
                500
            );
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $sucursal = $this->sucursalService->actualizarSucursal(
                $id,
                $request->all()
            );

            if (!$sucursal) {
                return ApiResponse::error(
                    'Sucursal no encontrada',
                    404
                );
            }

            return ApiResponse::success(
                'Sucursal actualizada correctamente',
                $sucursal
            );

        } catch (\Throwable $th) {

            Log::error('Error al actualizar sucursal', [
                'exception' => $th
            ]);

            return ApiResponse::error(
                'Error al actualizar sucursal',
                500
            );
        }
    }

    public function destroy(string $id)
    {
        try {
            $sucursal = $this->sucursalService->deshabilitarSucursal($id);

            if (!$sucursal) {
                return ApiResponse::error(
                    'Sucursal no encontrada',
                    404
                );
            }

            return ApiResponse::success(
                'Sucursal deshabilitada correctamente',
                $sucursal
            );

        } catch (\Throwable $th) {

            Log::error('Error al deshabilitar sucursal', [
                'exception' => $th
            ]);

            return ApiResponse::error(
                'Error al deshabilitar sucursal',
                500
            );
        }
    }
}
