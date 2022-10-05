@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <h4 class="card-title">About Page</h4>
            <form method="POST" action="{{ route('update.about') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $about->id }}">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input name="title" class="form-control" id="title" type="text" value="{{ $about->title }}">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short title</label>
                    <div class="col-sm-10">
                        <input name="short_title" class="form-control" id="short_title" type="text" value="{{ $about->short_title }}">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description </label>
                    <div class="col-sm-10">
                       <textarea required="" name="short_description" class="form-control" rows="5">{{ $about->short_description }}</textarea>
                    </div>
                </div>
                <!-- end row -->
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="long_description">{{ $about->long_description }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                    <div class="col-sm-10">
                        <input name="about_image" class="form-control" id="image" type="file" >
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($about->about_image)) ? url($about->about_image):(url('upload/no-image.jpg')) }}" alt="Card image cap">
                    </div>
                </div>
                <!-- end row -->


                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update about page">
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


