<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Computer extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'number',
        'brand',
    ];

    public function apprentices()
    {
        return $this->hasMany(Apprentice::class);
    }
}
