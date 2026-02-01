<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function obtenerUsuarios(array $filtros)
    {
        $query = User::query();

        // 🔍 Filtro por nombre (LIKE)
        if (!empty($filtros['nombre'])) {
            $query->where('nombre', 'like', '%' . $filtros['nombre'] . '%');
        }

        // 📧 Filtro por email (exacto)
        if (!empty($filtros['email'])) {
            $query->where('email', $filtros['email']);
        }

        // 🎭 Filtro por roles
        if (!empty($filtros['roles']) && is_array($filtros['roles'])) {
            $query->whereIn('id_rol', $filtros['roles']);
        }

        // 📅 Fecha creación desde
        if (!empty($filtros['created_from'])) {
            $query->whereDate('created_at', '>=', $filtros['created_from']);
        }

        // 📅 Fecha creación hasta
        if (!empty($filtros['created_to'])) {
            $query->whereDate('created_at', '<=', $filtros['created_to']);
        }

        // 📅 Fecha actualización desde
        if (!empty($filtros['updated_from'])) {
            $query->whereDate('updated_at', '>=', $filtros['updated_from']);
        }

        // 📅 Fecha actualización hasta
        if (!empty($filtros['updated_to'])) {
            $query->whereDate('updated_at', '<=', $filtros['updated_to']);
        }

        // 📄 Paginación
        return $query->paginate(15);
    }

    public function obtenerUsuario( string $id_user){
        return $this->getUser($id_user);
    }

    public function actualizarUsuario(string $id_user , array $datos){

        $usuario = $this->getUser($id_user);

        if(!$usuario){
            return null;
        }

        // 🔍 Filtro por nombre (LIKE)
        if (!empty($datos['nombre'])) {
            $usuario->nombre = $datos['nombre'];
        }

        // 📧 Filtro por email (exacto)
        if (!empty($datos['email'])) {
            $usuario->email = $datos['email'];
        }

        // 🎭 Filtro por roles
        if (!empty($datos['id_rol'])) {
            $usuario->id_rol = $datos['id_rol'];
        }
        $usuario->save();
        return $usuario;
    }

    public function deshabilitarUsuario(string $id_user){

        $usuario = $this->getUser($id_user);

        if(!$usuario){
            return null;
        }
        $usuario->activo = false;
        $usuario->save();

        return $usuario;
    }

    // helpers

    protected function getUser( string $id_user){
        $usuario = User::where('id_user', $id_user)->first();
        
        if(!$usuario){
            return null;
        }
        if(!$usuario->activo){
            return null;
        }

        return $usuario;
    }
}
