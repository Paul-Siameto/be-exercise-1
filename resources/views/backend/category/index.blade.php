@extends('layout')
@section('meta_desc','$meta_desc')
@section('title',$title)
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h1 class="h3 mb-4 text-gray-800">Categories</h1>
                        <a href="{{url('admin/category/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Detail</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Detail</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $cat)
                                        <tr>
                                            <td>{{$cat->id}}</td>
                                            <td>{{$cat->title}}</td>
                                            <td>{{$cat->detail}}</td>
                                            <td><img src="{{ asset('imgs').'/'.$cat->image }}" width="100" /></td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="{{url('admin/category/'.$cat->id.'/edit')}}">Update</a>
                                                <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/category/'.$cat->id.'/delete')}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

@endsection