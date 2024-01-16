@extends('layout')
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card-header">
                    <h1 class="h3 mb-4 text-gray-800">Add Category</h1>
                    <a href="{{url('admin/category')}}" class="float-right btn btn-sm btn-dark">All Data</a>
                    </div>

                    @if($errors)
                        @foreach($errors->all() as $error)
                           <p class="text-danger">{{$error}}</p>
                        @endforeach
                    @endif

                    @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                    @endif
                    <form method="post" action="{{url('admin/category')}}" enctype="multipart/form-data">
                        @csrf
                       <div class="form-group">
                            <label for="formGroupInput">Title</label>
                            <input type="text" name="title" class="form-control" id="formGroupInputtitle" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Detail</label>
                            <input type="text" name="detail" class="form-control" id="formGroupInputdetails" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="formGroupInputimage">Image</label>
                            <input type="file" name="cat_image" class="form-control" id="imageFile" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

@endsection