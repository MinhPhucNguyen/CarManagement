<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'features';

    protected $primaryKey = 'id';
    
    protected $fillable = ['id', 'name', 'logo'];

    public function cars(){
        return $this->belongsToMany(Car::class, 'car_feature');
    }
}
