<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CarRentalPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'start_datetime',
        'end_datetime',
        'is_active',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
