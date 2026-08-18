<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

// Modelo de Curso - Representa un curso académico específico
class Course extends Model
{
    // Conexión a la base de datos MongoDB
    protected $connection = 'mongodb';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'course_number',     // Número o código del curso
        'day',               // Día en que se imparte
        'area_id',           // Referencia al área
        'training_center_id' // Centro de capacitación
    ];

    // Atributos computados a incluir en la serialización
    protected $appends = ['area_name', 'training_center_name', 'course_display'];

    // Relación: Un curso pertenece a un área
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    // Relación: Un curso pertenece a un centro de capacitación
    public function trainingCenter()
    {
        return $this->belongsTo(Training_Center::class, 'training_center_id');
    }

    // Relación: Un curso tiene muchos aprendices
    public function apprentices()
    {
        return $this->hasMany(Apprentice::class, 'course_id');
    }

    // Relación: Un curso tiene muchos maestros (relación muchos a muchos)
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, null, 'course_id', 'teacher_id');
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

    public function getCourseDisplayAttribute()
    {
        return "{$this->course_number} - Área: {$this->area_name}";
    }
}