<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'car_name',
        'description',
        'price',
        'seats',
        'fuel',
        'year',
        'speed',
        'capacity',
        'brand_id',
    ];

    protected $table = 'cars';

    protected $primaryKey = 'car_id';
    public $timestamps = false;

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function carImages(){
        return $this->hasMany(CarImage::class, 'car_id');
    }
}
