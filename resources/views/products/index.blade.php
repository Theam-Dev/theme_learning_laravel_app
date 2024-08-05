@extends("layouts/app")
@section("content")
    <h2>Product</h2>
    <a href="{{ route('product-create') }}" class="btn btn-primary">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Categories</th>
            <th>Title</th>
            <th>Image</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->categories->title }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <img src="{{ url('storage/' . $item->images) }}" width="80" />
                </td>
                <td>{{ $item->price }}</td>
                <td>
                    <a href="{{route('categories-edit',$item->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{route('categories-delete',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
