<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Categories;
use App\Models\Products;
class AppController extends Controller
{
    public function index(){
        $slide = Slide::skip(0)->take(3)->orderBy("id","DESC")->get();
        $category = Categories::all();
        $data = array(
            "slide" => $slide,
            "category" => $category,
            "product" => Products::with("gallery")->get()
        );

        return response()->json($data);
    }
}
