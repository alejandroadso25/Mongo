<?php

namespace App\Models;

// 1. REEMPLAZAMOS el modelo original por el de MongoDB
use MongoDB\Laravel\Eloquent\Model; 
use App\Models\Course;
use App\Models\Computer;

class Apprentice extends Model
{

    // 2. LE DECIMOS que use la conexión que creamos en database.php
    protected $connection = 'mongodb';

    // Queda exactamente igual
    protected $fillable = ['name', 'email', 'cell_number', 'course_id', 'computer_id'];

    // Tus relaciones se mantienen intactas y seguirán funcionando
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
}