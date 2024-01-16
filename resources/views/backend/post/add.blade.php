@extends('layout')
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card-header">
                    <h1 class="h3 mb-4 text-gray-800">Add Post</h1>
                    <a href="{{url('admin/post')}}" class="float-right btn btn-sm btn-dark">All Data</a>
                    </div>

                    @if($errors)
                        @foreach($errors->all() as $error)
                           <p class="text-danger">{{$error}}</p>
                        @endforeach
                    @endif

                    @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                    @endif
                    <form method="post" action="{{url('admin/post')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupInput">Category<span class="text-danger">*</span></label>
                            <select class="form-control" name="category">
                            @foreach($cats as $cat)
                              <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach
                            </select>
                        </div>
                       <div class="form-group">
                            <label for="formGroupInput">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" id="formGroupInputtitle" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="formGroupInputimage">Thumbnail</label>
                            <input type="file" name="post_thumb" class="form-control" id="imageFile" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="formGroupInputimage">Full Image</label>
                            <input type="file" name="post_image" class="form-control" id="imageFile" />
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Detail<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="detail"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="formGroupInputimage">Tags</label>
                            <textarea class="form-control" name="tags"></textarea>
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