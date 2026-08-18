<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

// Modelo de asignación de Cursos a Instructores/Maestros
class CourseTeacher extends Model
{
    // Conexión a la base de datos MongoDB
    protected $connection = 'mongodb';

    // Colección en la base de datos
    protected $table = 'course_teachers';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'course_id',  // Referencia al curso
        'teacher_id'  // Referencia al maestro/instructor
    ];

    // Relación: Esta asignación pertenece a un Curso
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Relación: Esta asignación pertenece a un Instructor/Maestro
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}