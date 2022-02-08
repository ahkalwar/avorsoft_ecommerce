<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $with = [
        'product:id,Product_Name,Description,Price,Stock,is_active',
        'user:id,name,email'
    ];
    public function product()
    {
        return $this->belongsTO('App\Models\Product')->with('images');
    }
    public function user()
    {
        return $this->belongsTO('App\Models\User');
    }
}
