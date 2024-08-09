<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory, SoftDeletes;

    protected $visible =["id","title","imagelink"];
    protected $appends = ["imagelink"];

    public function getimagelinkAttribute(){
        return asset('storage/'. $this->images);
    }
    public function product()
    {
        return $this->hasMany(Products::class,"categoryid","id");
    }
}
