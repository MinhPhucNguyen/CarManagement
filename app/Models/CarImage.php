<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CarImage extends Model
{
    use HasFactory;
    protected $table = 'car_images';
    protected $primaryKey = 'image_id';
    protected $fillable = ['image_id', 'car_id', 'image'];

    public function cars()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function getImageAttribute($value)
    {
        return Storage::url('carimages/' . $this->car_id . '/' . $value);
    }
}
