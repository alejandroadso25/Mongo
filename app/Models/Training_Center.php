<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

// Modelo de Centro de Capacitación - Representa instituciones que imparten cursos
class Training_Center extends Model
{
    // Conexión a la base de datos MongoDB
    protected $connection = 'mongodb';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',     // Nombre del centro
        'location'  // Ubicación del centro
    ];

    // Relación: Un centro tiene muchas áreas
    public function areas(){
        return $this->hasMany(Area::class, 'training_center_id');
    }

    // Relación: Un centro imparte muchos cursos
    public function courses(){
        return $this->hasMany(Course::class, 'training_center_id');
    }

    // Relación: Un centro emplea muchos maestros
    public function teachers(){
        return $this->hasMany(Teacher::class, 'training_center_id');
    }
} 