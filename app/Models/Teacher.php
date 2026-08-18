<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

// Modelo de Maestro/Profesor - Representa a docentes del sistema
class Teacher extends Model
{
    // Conexión a la base de datos MongoDB
    protected $connection = 'mongodb';
    
    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',               // Nombre del maestro
        'email',              // Email del maestro
        'area_id',           // Área de especialidad
        'training_center_id' // Centro de capacitación
    ];

    // Atributos computados a incluir en la serialización
    protected $appends = ['area_name', 'training_center_name'];

    // Relación: Un maestro pertenece a un área
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    // Relación: Un maestro pertenece a un centro de capacitación
    public function trainingCenter()
    {
        return $this->belongsTo(Training_Center::class, 'training_center_id');
    }

    // Relación: Un maestro enseña muchos cursos (relación muchos a muchos)
    public function courses()
    {
        return $this->belongsToMany(Course::class, null, 'teacher_id', 'course_id');
    }

    // Acesores para mostrar información legible
    public function getAreaNameAttribute()
    {
        return $this->area?->name ?? 'Sin área asignada';
    }

    public function getTrainingCenterNameAttribute()
    {
        return $this->trainingCenter?->name ?? 'Sin centro asignado';
    }
}