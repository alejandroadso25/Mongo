<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Apprentice extends Model
{
    // Conexión a MongoDB
    protected $connection = 'mongodb';

    // Campos asignables masivamente
    protected $fillable = [
        'name',
        'email',
        'cell_number',
        'course_id',
        'computer_id'
    ];

    // Atributos computados a incluir en la serialización
    protected $appends = ['course_display', 'computer_display'];

    // Relación: un aprendiz pertenece a un curso
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Relación: un aprendiz usa una computadora
    public function computer()
    {
        return $this->belongsTo(Computer::class, 'computer_id');
    }

    // Acesores para mostrar información legible
    public function getCourseDisplayAttribute()
    {
        return $this->course?->course_number ?? 'No asignado';
    }

    public function getComputerDisplayAttribute()
    {
        return $this->computer?->full_name ?? 'No asignada';
    }
}