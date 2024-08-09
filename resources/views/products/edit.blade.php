@extends("layouts/app")
@section("content")
    <form action="{{route('product-update',$data->id)}}" enctype="multipart/form-data" method="post">
        @method("PUT")
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2">
                    <label>Categories</label>
                    <select class="form-select" name="categoryid">
                        @foreach($categories as $item)
                            <option value="{{$item->id}}" {{ $data->categoryid == $item->id ? "selected" : ''}} >{{$item->title}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group mb-2">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{$data->title}}"/>
                    @if($errors->has('title'))
                        <span class='text-danger'>
               {{ $errors->first('title') }}
             </span>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" value="{{$data->prices}}"/>
                    @if($errors->has('price'))
                        <span class='text-danger'>
               {{ $errors->first('price') }}
             </span>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>Image</label>
                    <input type="file" name="images" class="form-control"/>
                    @if($errors->has('images'))
                        <span class='text-danger'>
               {{ $errors->first('images') }}
             </span>
                    @endif
                </div>

                <div class="form-group mb-2">
                    <label>Product Gallery</label>
                    <input type="file" name="imagesgallery[]" class="form-control" multiple/>
                    @if($errors->has('imagesgallery'))
                        <span class='text-danger'>
               {{ $errors->first('imagesgallery') }}
             </span>
                    @endif
                </div>
                <input type="submit" class="btn btn-primary" value="Save"/>
            </div>
            <div class="col-md-8">
                <div class="form-group mb-2">
                    <label>Description</label>
                    <textarea id="description" name="description">{{$data->description}}</textarea>
                    @if($errors->has('description'))
                        <span class='text-danger'>
               {{ $errors->first('description') }}
             </span>
                    @endif
                </div>
            </div>
        </div>
    </form>

@endsection
@section('scripts')
    <script type="text/javascript">

        tinymce.init({
            selector: 'textarea#description',
            forced_root_block: "div",
            height: 500,
            menubar: false,
            // Upload Image=======================================================================
            plugins: [
                "advlist",  "lists","charmap", "preview",
                "anchor", "searchreplace", "visualblocks", "fullscreen",
                "insertdatetime", "media", "table", "code", "wordcount", "codesample", "code"
            ],
            toolbar: "blocks bold italic backcolor " +
                "alignleft aligncenter alignright alignjustify " +
                "bullist numlist outdent indent image removeformat codesample code",

            //  content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }"
        });
    </script>
@endsection
