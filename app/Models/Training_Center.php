<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Training_Center extends Model
{

    protected $connection = 'mongodb';

    protected $fillable = [
        'name',
        'location'
    ];


    public function areas(){
        return $this->hasMany('App\Models\Area');
    }

    public function courses(){
        return $this->hasMany('App\Models\Course');
    }

    public function teachers(){
        return $this->hasMany('App\Models\Teacher');
    }
} 