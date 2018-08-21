<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id' ,'id');

    }
}
