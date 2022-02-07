<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $with = [
        'category:id,category_name'
    ];
    public function category()
    {
        return $this->belongsTO('App\Models\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }
}
