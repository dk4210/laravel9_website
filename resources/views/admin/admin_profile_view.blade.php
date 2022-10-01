@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                       <div class="card-group">
                        <div class="card mb-4">
                            <div style="text-align: center;margin-top:20px;">
                            <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image)) ? url('upload/admin_images/'.$adminData->profile_image):(url('upload/no-image.jpg')) }}" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Name: {{$adminData->name}}</h4>
                                <hr>
                                <h4 class="card-title">Email: {{$adminData->email}}</h4>
                                <hr>
                                <h4 class="card-title">Username: {{$adminData->username}}</h4>
                                <hr>
                                <h4 class="card-title">Member Science: {{$adminData->created_at}}</h4>
                                <hr>

                                <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
