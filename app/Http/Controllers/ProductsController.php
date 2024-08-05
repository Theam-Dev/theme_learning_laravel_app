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
        $data = Products::with("categories")->get();
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
            "images" => "required"
        ]);
        $data = new Products();
        $data->categoryid = $request->categoryid;
        $data->title = $request->title;
        $data->prices = $request->price;
        $data->images = $request->images->store('images');
        $data->description = $request->description;
        $data->save();
        return redirect()->route('products');
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
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }
}
