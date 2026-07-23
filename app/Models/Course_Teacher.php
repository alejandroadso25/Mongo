<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Course_Teacher extends Model
{
    protected $connection = 'mongodb';

    protected $table = 'course__teachers';

    protected $fillable = ['course_id', 'teacher_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
