<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

// Modelo de Área - Representa áreas de especialización
class Area extends Model
{
    // Conexión a la base de datos MongoDB
    protected $connection = 'mongodb';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'name'  // Nombre del área
    ];

    // Relación: Un área tiene muchas computadoras
    public function computers()
    {
        return $this->hasMany(Computer::class, 'area_id');
    }

    // Relación: Un área tiene muchos maestros
    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'area_id');
    }

    // Relación: Un área tiene muchos cursos
    public function courses()
    {
        return $this->hasMany(Course::class, 'area_id');
    }
}