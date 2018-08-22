<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    protected $table = 'cars';

    protected $fillable = [
        'make',
        'model',
        'year',
        'state_number',
        'ecu_name',
        'chiptuned',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;


    public function visits()
    {
        return $this->hasMany(Visit::class, 'car_id' ,'id');
    }
}
