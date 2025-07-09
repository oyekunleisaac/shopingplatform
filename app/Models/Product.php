<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'image', 'price', 'category'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset('storage/products/' . $this->image);
    }
}
