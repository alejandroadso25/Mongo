<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Area extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'name'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
