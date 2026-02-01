<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //clase protegiada
    protected AuthService $authService;
    public function __construct(AuthService $authService)
    {
    /**
     * Laravel ve el tipo AuthService en el parámetro
     * y hace lo siguiente internamente:
     *
     * 1. Busca la clase App\Services\AuthService
     * 2. Crea una instancia (new AuthService)
     * 3. La inyecta aquí como $authService
     *
     * Esto se llama Dependency Injection.
     */

    // Guardamos la instancia del servicio
    // en una propiedad de la clase para
    // poder usarla en cualquier método
    // del controller (register, login, etc.)
    $this->authService = $authService;
    }

    public function register(Request $request) {
        try {
            $user = $this->authService->register($request->all());
            return response()->json([
                'message' => 'Usuario creado correctamente',
                'data' => $user
            ], 201);
        } catch (\Throwable $th) {
            Log::error('Error al crear usuario', [
                'exception' => $th
            ]);
            return response()->json([
                'messege' => 'error al crear el usuario',
                'status' => '500',]);
        }
    }


  public function login(Request $request)
    {
        try {
            $user = $this->authService->login($request->all());

            // ❌ Credenciales inválidas
            if (!$user) {
                return response()->json([
                    'message' => 'Credenciales inválidas'
                ], 401);
            }

            // ✅ Crear token con Sanctum
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login correcto',
                'token' => $token,
                'data' => $user
            ], 200);

        } catch (\Throwable $th) {

            Log::error('Error al logear usuario', [
                'exception' => $th
            ]);

            return response()->json([
                'message' => 'Error interno al intentar iniciar sesión'
            ], 500);
        }
    }

}
