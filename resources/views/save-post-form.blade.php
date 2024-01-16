@extends('frontlayout')
@section('title','Save Post')
@section('content')
        <!-- Page content-->
        <div class="container mt-4">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <div class="row-mb-4">
                        
                        <div class="container-fluid">

<div class="card-header">
<h1 class="h3 mb-4 text-gray-800">Add Post</h1>
<a href="{{url('save-post-form')}}" class="float-right btn btn-sm btn-dark">All Data</a>
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
                    </div>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                            <div class="card-body">
                                <form action="{{url('/')}}">
                                <div class="input-group">
                                    <input class="form-control" name="q" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                    <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!--Recent Posts-->
                    <div class="card mb-4">
                        <div class="card-header">Recent Posts</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    @if($recent_posts)
                                    @foreach($recent_posts as $post)
                                    <ul class="list group list-group-flush">
                                        <li><a href="" class="list-group-flush">{{$post->title}}</a></li>
                                        
                                    </ul>
                                    @endforeach
                                    @endif
                                    
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!--Popular Posts-->
                    <div class="card mb-4">
                        <div class="card-header">Popular Posts</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                @if($popular_posts)
                                    @foreach($popular_posts as $post)
                                    <ul class="list group list-group-flush">
                                        <li><a href="" class="list-group-flush">{{$post->title}}</a></li>
                                        
                                    </ul>
                                    @endforeach
                                    @endif
                                </div>
                            
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
@endsection
