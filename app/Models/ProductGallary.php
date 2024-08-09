<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallary extends Model
{
    use HasFactory;
    protected $appends = ["gallarylink"];

    public function getgallarylinkAttribute(){
        return asset('storage/'. $this->image_gallary);
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id',"id");
    }
}
