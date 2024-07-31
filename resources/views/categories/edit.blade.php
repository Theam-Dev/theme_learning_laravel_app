@extends('layouts.app')
@section('content')
    <h1>Create Categories</h1>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('categories-update',$data->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter title"
                                   name="title" value="{{$data->title}}">
                            @if($errors->has('title'))
                                <span class='text-danger'>
               {{ $errors->first('title') }}
             </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Image:</label>
                            <input type="file" class="form-control" name="images">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
@endsection
