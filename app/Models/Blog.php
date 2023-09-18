<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\BlogImage;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $primaryKey = 'blog_id';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'status'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImageAttribute($value)
    {
        return Storage::url('blogimages/' . $value);
    }

    public function blogImage()
    {
        return $this->hasMany(BlogImage::class, 'blog_id', 'blog_id');
    }
}
