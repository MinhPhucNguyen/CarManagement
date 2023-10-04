<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRentalTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'is_active',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
