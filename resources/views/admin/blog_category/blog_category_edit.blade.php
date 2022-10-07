@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <h4 class="card-title">Edit Blog Category Page</h4><br><br>
            <form method="POST" action="{{ route('update.blog.category',$blogcategory->id) }}">
                @csrf
                     <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                        <input name="blog_category" class="form-control" id="blog_category" type="text" value="{{ $blogcategory->blog_category}}">
                        @error('blog_category')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div><br>
                <!-- end row -->
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Category">
        </div>
    </div>



    </form>


@endsection


