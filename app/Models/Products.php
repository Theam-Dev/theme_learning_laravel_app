<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory,SoftDeletes;

    protected $visible = ['id','name','description','price','images','category_id',"gallery"];
    protected $appends = ["isImage"];

    public function getisImageAttribute(){
        return asset('storage/'. $this->images);
    }
    public function gallery()
    {
        return $this->hasMany(ProductGallary::class,"product_id","id");
    }
    public function categories()
    {
        return $this->belongsTo(Categories::class,"categoryid","id");
    }
}
