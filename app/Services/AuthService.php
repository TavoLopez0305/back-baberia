<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data)
    {
        return User::create([
            'id_user'   => $data['id_user'],
            'id_rol'    => $data['id_rol'],
            'nombre'    => $data['nombre'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'activo'    => true,
        ]);
    }

    public function login(array $data){
        $usuario = User::where('email',$data['email'])->first();
        // verificar existencia del user
        if(!$usuario){
            return null;
        }
        // esta activo?
        if (!$usuario->activo) {
            return null;
        }

        if (!Hash::check($data['password'], $usuario->password)) {
            return null;
        }

        // 5. Login correcto
        return $usuario;
        }
}
