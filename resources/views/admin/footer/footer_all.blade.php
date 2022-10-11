@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <h4 class="card-title">Footer Page</h4>
            <form method="POST" action="{{ route('update.footer', $allfooter->id) }}" >
                @csrf
                    <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                    <div class="col-sm-10">
                        <input name="number" class="form-control" id="number" type="text" value="{{ $allfooter->number }}">
                    </div>
                </div>
                <!-- end row -->
            <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description </label>
                    <div class="col-sm-10">
                        <textarea required="" name="short_description" class="form-control" rows="5">{{ $allfooter->short_description }}</textarea>
                    </div>
                </div>
                <!-- end row -->
                    <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input name="address" class="form-control" id="address" type="text" value="{{ $allfooter->address }}">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input name="email" class="form-control" id="email" type="email" value="{{ $allfooter->email }}">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">facebook</label>
                    <div class="col-sm-10">
                        <input name="facebook" class="form-control" id="facebook" type="text" value="{{ $allfooter->facebook }}">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-10">
                        <input name="twitter" class="form-control" id="twitter" type="text" value="{{ $allfooter->twitter }}">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                    <div class="col-sm-10">
                        <input name="copyright" class="form-control" id="copyright" type="text" value="{{ $allfooter->copyright }}">
                    </div>
                </div>
                <!-- end row -->



                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update footer page">
        </div>
    </div>



    </form>





@endsection


