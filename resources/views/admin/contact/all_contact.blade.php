@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Contact Message All</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>

                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <!--<th>Subject</th>-->
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>

                                </thead>


                                <tbody>
                                @php($i = 1)
                                @foreach($contacts as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <!--<td>{{ $item->subject }}</td>-->
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ \Illuminate\Support\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                                        <td>
                                                <a href="{{ route('delete.message', $item->id) }}" class="btn btn-danger sm" id="delete" title="Delete Data">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
    </div>


@endsection