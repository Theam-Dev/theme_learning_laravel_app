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
            <tr >
                <td>{{ $item->id }}</td>
                <td>{{ $item->categories->title }}</td>
                <td onclick="showGallery({{$item->id}})" style="color: #0dcaf0; cursor: pointer;">{{ $item->title }}</td>
                <td>
                    <img src="{{$item->isImage }}" width="80" />
                </td>
                <td>{{ $item->price }}</td>
                <td>
                    <button class="btn btn-primary btn-sm" onclick="showGallery({{$item->id}})">Gallery</button>
                    <a href="{{route('product-edit',$item->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{route('product-delete',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            @foreach($item->gallery as $gall)
                <tr class="gallery{{$gall->product_id}}" style="display: none;">
                    <td></td>
                    <td></td>
                    <td ></td>
                    <td>
                        <img src="{{ $gall->gallarylink }}" width="80" />
                    </td>
                    <td></td>
                    <td>
                    </td>
                </tr>
            @endforeach

        @endforeach
        </tbody>
    </table>
@endsection
@section("scripts")
    <script type="text/javascript">
            function showGallery(id){
                $(".gallery"+id).toggle();
            }
    </script>
@endsection
