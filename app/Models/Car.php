<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function visits()
    {
        return $this->hasMany(Visit::class, 'car_id' ,'id');
    }
}
