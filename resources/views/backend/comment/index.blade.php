@extends('layout')
@section('meta_desc','All Comments')
@section('title','$All Comments')
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h1 class="h3 mb-4 text-gray-800">Comments</h1>
                        <a href="{{url('admin/category/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $comment)
                                        <tr>
                                            <td>{{$comment->id}}</td>
                                            <td>@if(!empty($comment->user_id)) {{$comment->user->email}} @endif</td>
                                            <td>{{$comment->comment}}</td>
                                            <td>
                                                <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/comment/delete/'.$comment->id)}}">Delete</a>
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