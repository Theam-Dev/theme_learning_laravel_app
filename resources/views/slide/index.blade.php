@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <hr>
    <a href="{{ route('slide-create') }}" class="btn btn-primary">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <img src="{{ url('storage/' . $item->imageurl) }}" width="80" />
                </td>
                <td>
                    <a href="{{route('slide-delete',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
