@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <h4 class="card-title">Add Blog Category Page</h4><br><br>
            <form method="POST" id="myForm" action="{{ route('store.blog.category') }}">
                @csrf

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="form-group col-sm-10">
                        <input name="blog_category" class="form-control" id="blog_category" type="text">

                    </div>
                </div><br>
                <!-- end row -->
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Category">
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    blog_category: {
                        required : true,
                    },
                },
                messages :{
                    blog_category: {
                        required : 'Please Enter Blog Category',
                    },
                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>




@endsection


