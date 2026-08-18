<?php

namespace App\Models;

// Importar clase de autenticación de MongoDB
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Modelo de Usuario - Maneja la autenticación y datos de usuarios
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Conexión a la base de datos MongoDB
    protected $connection = 'mongodb';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Campos ocultos al serializar
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casteos de tipos de datos
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}