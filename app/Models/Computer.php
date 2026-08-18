<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

// Modelo de Computadora - Representa dispositivos asignados a áreas y aprendices
class Computer extends Model
{
    // Conexión a la base de datos MongoDB
    protected $connection = 'mongodb';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'number',   // Número o identificador de la computadora
        'brand',    // Marca de la computadora
        'area_id',  // Referencia al área donde se encuentra el equipo
    ];

    // Atributos computados a incluir en la serialización
    protected $appends = ['area_name', 'full_name'];

    // Relación: Un computador pertenece a un Área
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    // Relación: Una computadora puede ser usada por muchos aprendices
    public function apprentices()
    {
        return $this->hasMany(Apprentice::class, 'computer_id');
    }

    // Accesor: Nombre del área
    public function getAreaNameAttribute()
    {
        return $this->area?->name ?? 'Sin área asignada';
    }

    // Accesor: Nombre completo (marca + número)
    public function getFullNameAttribute()
    {
        return "{$this->brand} ({$this->number})";
    }
}