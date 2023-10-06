<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_name',
        'description',
        'price',
        'seats',
        'status',
        'fuel',
        'year',
        'speed',
        'fuel_consumption',
        'delivery_enable',
        'transmission',
        'location',
        'number_of_trip',
        'brand_id',
    ];

    protected $table = 'cars';

    protected $primaryKey = 'car_id';
    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function carImages()
    {
        return $this->hasMany(CarImage::class, 'car_id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'car_feature', 'car_id', 'feature_id');
    }

    public function favoriteByUser()
    {
        return $this->belongsToMany(User::class, 'favorites', 'car_id', 'user_id');
    }

    public function scopeSearch($query, $search) //scopeName là local scope trong laravel giúp định nghĩa các truy vấn
    {
        $search = "%$search%";

        $query->where(function ($query) use ($search) {
            $query->where('car_name', 'like', $search)
                ->orWhere('location', 'like', $search)
                ->orWhere('seats', 'like', $search)
                ->orWhere('price', 'like', $search)
                ->orWhere('number_of_trip', 'like', $search)
                ->orWhereHas('brand', function ($query) use ($search) {
                    $query->where('brand_name', 'like', $search);
                });
        });
    }

    public function carRentalPeriods()
    {
        return $this->hasMany(CarRentalPeriod::class, 'car_id');
    }
}
