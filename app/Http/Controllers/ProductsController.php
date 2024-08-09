<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductGallary;
use Illuminate\Http\Request;
use App\Models\Categories;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Products::with("categories","gallery")->get();
        //return response()->json($data);
       return view('products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "price" => "required",
            "images" => "required",
            "imagesgallery" => "required"
        ]);
        $data = new Products();
        $data->categoryid = $request->categoryid;
        $data->title = $request->title;
        $data->prices = $request->price;
        $data->images = $request->images->store('images');
        $data->description = $request->description;
        $data->save();

        $id = $data->id;
        $galleries = $request->file('imagesgallery');
        foreach($galleries as $image){
            $gall = new ProductGallary();
            $gall->product_id = $id;
            $gall->image_gallary = $image->store('images');
            $gall->save();
        }
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Categories::all();
        $data = Products::find($id);
        $arr = array(
            "categories" => $categories,
            "data" => $data
        );
        return view('products.edit', $arr);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "price" => "required"
        ]);
        $data = Products::find($id);
        $data->categoryid = $request->categoryid;
        $data->title = $request->title;
        $data->prices = $request->price;
        $data->description = $request->description;

        if($request->hasFile('images')){
            $file = $request->file('images')->store("images");
        }else{
            $file = $data->images;
        }
        $data->images = $file;
        $data->save();
        $galleries = $request->file('imagesgallery');
        if($galleries){
            $gg = ProductGallary::where('product_id', $id)->get();
            foreach ($gg as $record) {
                $record->delete();
            }
            foreach($galleries as $image){
                $gall = new ProductGallary();
                $gall->product_id = $id;
                $gall->image_gallary = $image->store('images');
                $gall->save();
            }
        }
        return redirect()->route('product');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Products::find($id);
        $data->delete();
        return redirect()->route('product');
    }
}
