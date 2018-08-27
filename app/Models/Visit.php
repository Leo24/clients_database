<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{

    protected $table = 'visits';

    protected $fillable = [
        'odometer_reading',
        'errors_petrol',
        'errors_gas',
        'work_petrol',
        'work_gas',
        'notes',
        'car_id',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id' ,'id');

    }
}
