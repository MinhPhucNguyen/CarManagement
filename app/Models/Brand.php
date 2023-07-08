<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'brands';

    protected $primaryKey = 'brand_id';

    protected $fillable = ['brand_id', 'brand_name', 'status'];

    public function cars()
    {
        return $this->hasMany(Car::class, 'brand_id', 'brand_id');
    }
}
