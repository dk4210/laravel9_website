@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <h4 class="card-title">Portfolio Page</h4>
            <form method="POST" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                    <div class="col-sm-10">
                        <input name="name" class="form-control" id="name" type="text">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio title</label>
                    <div class="col-sm-10">
                        <input name="title" class="form-control" id="title" type="text">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description </label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="description"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                    <div class="col-sm-10">
                        <input name="image" class="form-control" id="image" type="file" >
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no-image.jpg') }}" alt="Card image cap">
                    </div>
                </div>
                <!-- end row -->


                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Portfolio">
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


