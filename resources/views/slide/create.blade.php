@extends('layouts.app')
@section('content')
    <h1>Create Slide</h1>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('slide-store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="imageurl" class="form-label">Image:</label>
                            <input type="file" class="form-control" name="imageurl">
                        </div>
                        <input type="hidden" value="{{url("theme/img/qdBA6nNGBuM0whPX0oXBmJZeFWJEw8DnWJsPNHZyc.png")}}" name="imgdetail">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
@endsection
