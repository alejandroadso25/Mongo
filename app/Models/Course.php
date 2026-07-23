<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Course extends Model
{
    
    protected $connection = 'mongodb';

    protected $fillable = [
        'course_number',
        'day',
        'area_id',
        'training_center_id'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function trainingCenter()
    {
        return $this->belongsTo(Training_Center::class, 'training_center_id');
    }

    public function apprentices()
    {
        return $this->hasMany(Apprentice::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'course__teachers');
    }
}
