@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Blog All</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>

                                <tr>
                                    <th>Id</th>
                                    <th>Blog Category</th>
                                    <th>Blog Title</th>
                                    <th>Blog Tags</th>
                                    <th>Blog Image</th>
                                    <th>Action</th>

                                </tr>

                                </thead>


                                <tbody>
                                @php($i = 1)
                                @foreach($blogs as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->category_id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->tags }}</td>
                                        <td><img src="{{ asset($item->image) }}" style="width:60px;height:50px;"></td>
                                        <td>
                                            <a href="{{ route('edit.portfolio', $item->id) }}" class="btn btn-info sm" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('delete.portfolio', $item->id) }}" class="btn btn-danger sm" id="delete" title="Delete Data">
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
