<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected UserService $userService;

    public  function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function index(Request $request){
        try {
              $usuarios = $this->userService->obtenerUsuarios($request->all());
                return ApiResponse::success(
                'Datos obtenidos correctamente',
                    $usuarios
                );
        } catch (\Throwable $th) {
            Log::error('Error al obtener usuarios', [
                'exception' => $th
            ]);
           return ApiResponse::error(
            'Error al obtener los datos',
            500
        );
        }
    }
    public function show(string $id){
        // if(!$id){
        //     return ApiResponse::error(
        //     'sin id usuaario',500
        //     );
        // }
        try {
            $usuario = $this->userService->obtenerUsuario($id);
            // cuando regesa en null
            if (!$usuario) {
                return ApiResponse::error(
                    'Usuario no encontrado',
                    404
                );
            }

            return ApiResponse::success(
                'Datos obtenidos correctamente',
                    $usuario
                );

        } catch (\Throwable $th) {
            Log::error('Error al obtener usuario', [
                'exception' => $th
            ]);
            return ApiResponse::error(
                'Error al obtener los datos',
                500
            );
        }
    }
    public function update(Request $request, string $id){
        // if(!$id){
        //     return ApiResponse::error(
        //     'sin id usuaario',500
        //     );
        // }
        try {
            $usuario = $this->userService->actualizarUsuario($id, $request->all());
            // cuando regesa en null
            if (!$usuario) {
                return ApiResponse::error(
                    'Usuario no encontrado',
                    404
                );
            }

            return ApiResponse::success(
                'Datos actualizados correctamente',
                    $usuario
                );

        } catch (\Throwable $th) {
            Log::error('Error al actualizar usuario', [
                'exception' => $th
            ]);
            return ApiResponse::error(
                'Error al actualizar los datos',
                500
            );
        }
    }
    public function destroy(string $id){
        // if(!$id){
        //     return ApiResponse::error(
        //     'sin id usuaario',500
        //     );
        // }
        try {
            $usuario = $this->userService->deshabilitarUsuario($id);
            // cuando regesa en null
            if (!$usuario) {
                return ApiResponse::error(
                    'Usuario no encontrado',
                    404
                );
            }

            return ApiResponse::success(
                'Usuario deshabilitado correctamente',
                    $usuario
                );

        } catch (\Throwable $th) {
            Log::error('Error al deshabilitado usuario', [
                'exception' => $th
            ]);
            return ApiResponse::error(
                'Error al deshabilitado Usuario',
                500
            );
        }
    }

}
