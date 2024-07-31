<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\File;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Categories::orderBy("id","desc")->paginate(6);
        return view("categories/index",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

      if($request->file("images")){
        $img =  $request->images->store("images");
      }else{

          $img = "images/qdBA6nNGBuM0whPX0oXBmJZeFWJEw8DnWJsPNHZyc.png";
      }
        $data = new Categories();
        $data->title = $request->title;
        $data->images = $img;
        $data->save();
        return redirect()->route("categories");

    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Categories::find($id);
        return view("categories/edit",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $data = Categories::find($id);

        if($request->file("images")){
            $img =  $request->images->store("images");
        }else{

            $img = $data->images;
        }
        $data->title = $request->title;
        $data->images = $img;
        $data->update();
        return redirect()->route("categories");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
