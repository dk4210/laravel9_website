@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <h4 class="card-title">Change Password Page</h4><br><br>

           @if(count($errors))
            @foreach($errors->all() as $error)
               <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
            @endforeach
            @endif

            <form method="POST" action="{{ route('update.password') }}">
                @csrf
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                        <br>
                        <input name="oldpassword" class="form-control" id="oldpassword" type="password" value="">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <br>
                        <input name="newpassword" class="form-control" id="newpassword" type="password" value="">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <br>
                        <input name="confirm_password" class="form-control" id="confirm_password" type="password" value="">
                    </div>
                </div>
                <!-- end row -->


    <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">

    </form>




@endsection

