@extends('layout')
@section('content')


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card-header">
                    <h1 class="h3 mb-4 text-gray-800">Update Post</h1>
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
                    <form method="post" action="{{url('admin/post/'.$data->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="formGroupInput">Category<span class="text-danger">*</span></label>
                            <select class="form-control" name="category">
                            @foreach($cats as $cat)
                            @if($cat->id==$data->cat_id)
                          <option selected value="{{$cat->id}}">{{$cat->title}}</option>
                          @else
                          <option value="{{$cat->id}}">{{$cat->title}}</option>
                          @endif
                        
                            @endforeach
                            </select>
                        </div>
                       <div class="form-group">
                            <label for="formGroupInput">Title</label>
                            <input type="text" value="{{$data->title}}" name="title" class="form-control" id="formGroupInputtitle" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="formGroupInputthumb">Thumb</label>
                            <p class="my-2"><img width="80" src="{{asset('imgs/thumb')}}/{{$data->thumb}}" /></p>
                            <input type="hidden" value="{{$data->thumb}}" name="post_thumb" />
                            <input type="file" name="post_thumb" class="form-control" id="imageFile" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="formGroupInputimage">Full Image</label>
                            <p class="my-2"><img width="80" src="{{asset('imgs/full')}}/{{$data->full_img}}" /></p>
                            <input type="hidden" value="{{$data->full_img}}" name="post_image" />
                            <input type="file" name="post_image" class="form-control" id="imageFile" />
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Detail<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="detail">{{$data->detail}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="formGroupInputimage">Tags</label>
                            <textarea class="form-control" name="tags">{{$data->tags}}</textarea>
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