<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

// Modelo de Computadora
class Computer extends Model
{
    // Conexión a la base de datos MongoDB
    protected $connection = 'mongodb';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'number',   // Número o identificador de la computadora
        'brand',    // Marca de la computadora
    ];

    // Atributos computados a incluir en la serialización
    protected $appends = ['full_name'];

    // Relación: Una computadora puede ser usada por muchos aprendices
    public function apprentices()
    {
        return $this->hasMany(Apprentice::class, 'computer_id');
    }

    // Accesor: Nombre completo (marca + número)
    public function getFullNameAttribute()
    {
        return "{$this->brand} ({$this->number})";
    }
}