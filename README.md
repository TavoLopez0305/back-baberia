<<<<<<< HEAD
# back-baberia
Back hecho en laravel para ser consumido atreves de empoints 
=======
# Backend Barbería

Este es un proyecto Laravel para gestionar servicios de una barbería, incluyendo productos, usuarios y órdenes.

## Requisitos
- PHP (versión compatible con Laravel 12)
- Composer
- MySQL

## Configuración e instalación
1. Clona este repositorio.
2. Copia el archivo `.env.example` a `.env`.
3. Configura las variables de entorno en `.env` (especialmente DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
4. Ejecuta `composer install`.
5. Genera la clave de la aplicación con `php artisan key:generate`.
6. Ejecuta las migraciones con `php artisan migrate`.

## Uso
Para levantar el servidor en desarrollo:
`php artisan serve`

El backend expone endpoints para gestionar usuarios, productos y órdenes. Consulta el código o agrega más detalles según creas necesario.
>>>>>>> 75eed43 (feature: crear estructura inicial del backend y esquema de base de datos)
