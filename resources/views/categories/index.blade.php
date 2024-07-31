@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <hr>
    <a href="{{ route('categories-create') }}" class="btn btn-primary">Create</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <img src="{{ url('storage/' . $item->images) }}" width="80" />
                    </td>
                    <td>
                        <a href="{{route('categories-edit',$item->id)}}" class="btn btn-info btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    {{ $data->links() }}
@endsection
