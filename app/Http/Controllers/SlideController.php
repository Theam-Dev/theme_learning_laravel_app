<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(storage_path('theme/img/qdBA6nNGBuM0whPX0oXBmJZeFWJEw8DnWJsPNHZyc.png'));
        //dd(url("theme/img/qdBA6nNGBuM0whPX0oXBmJZeFWJEw8DnWJsPNHZyc.png"));
        $data = Slide::all();
        return view('slide.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('imageurl')){
            $file = $request->file('imageurl')->store("images");
        }else{
            $publicPath = public_path('theme/img/qdBA6nNGBuM0whPX0oXBmJZeFWJEw8DnWJsPNHZyc.png');
            $img = new File($publicPath);
            $file = Storage::putFile('images', $img);
        }
        $data = new Slide();
        $data->imageurl = $file;
        $data->save();
        return redirect()->route('slide');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Slide::find($id);
        return view('slide.edit', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Slide::find($id);
        if($data != null){
            Storage::delete($data->imageurl);
            $data->delete();
        }
        return redirect()->route('slide');

    }
}
