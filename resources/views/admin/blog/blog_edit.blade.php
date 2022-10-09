@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .bootstrap-tagsinput .tag{
            margin-right: 2px;
            color: #b70000;
            font-weight: 700px;
        }
    </style>

    <div class="page-content">
        <div class="container-fluid">
            <h4 class="card-title">Edit Blog Page</h4>
            <form method="POST" action="{{ route('update.blog',$blogs->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            <option selected="">Choose</option>
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}" {{ $cat->id == $blogs->category_id ? 'selected' : '' }}>{{$cat->blog_category}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog title</label>
                    <div class="col-sm-10">
                        <input name="title" value="{{ $blogs->title }}" class="form-control" id="title" type="text">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                    <div class="col-sm-10">
                        <input name="tags" class="form-control" value="{{ $blogs->tags }}" type="text" data-role="tagsinput">
                        @error('tags')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description </label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="description">{{ $blogs->description }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                    <div class="col-sm-10">
                        <input name="image" class="form-control" id="image" type="file" >
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg" src="{{ asset($blogs->image) }}" alt="Card image cap">
                    </div>
                </div>
                <!-- end row -->


                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Blog">
        </div>
    </div>



    </form>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload= function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>




@endsection


