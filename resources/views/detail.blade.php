@extends('frontlayout')
@section('title','Home')
@section('content')
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                    @endif
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="card-header">{{$detail->title}}</h1>
                            <!-- Post meta content
                            <div class="text-muted fst-italic mb-2">Posted on January 1, 2023 by Start Bootstrap</div>-->
                            <!-- Post categories-->
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><<img src="{{asset('imgs/full/'.$detail->full_img)}}" class="card-img-top" alt="{{$detail->title}}"/></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <div class="card-body">
						        {{$detail->detail}}
					        </div> 
                            <div>
                                <a href="{{url('cateogry/'.Str::slug($detail->category->title).'/'.$detail->category->id)}}}">In {{$detail->category->title}}</a>
                            </div>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                @auth
                                    <form method="post" action="{{url('save-comment/'.Str::slug($detail->title).'/'.$detail->id)}}" class="mb-4">
                                        @csrf
                                        <textarea class="form-control" name="comment" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                        <input type="submit" class="btn btn-dark mt-2"/>
                                    </form>

                                @endauth
                                
                                <!--fetch comment-->
                                <div class="d-flex mb-4">
                                   
                                        <h5 class="card-hearder">Comments <span class="badge badge-info">{{count($detail->comments)}}</span></h5>
                                        <div class="card-body">
                                            @if($detail->comments)
                                            @foreach($detail->comments as $comment)
                                            <!-- Parent comment-->
                                            <div class="ms-3">
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                    @if($comment->user_id==0)
                                                       <div class="fw-bold">Admin</div>
                                                    @else
                                                        <div class="fw-bold">{{$comment->user->name}}</div>
                                                    @endif
                                                    <p class="mb-0">{{$comment->comment}}</p>
                                            </div>
                                            @endforeach
                                            @endif
                                            
                                        
                                        <!-- Child comment 1
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                            </div>
                                        </div>-->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
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
                    <!-- Popular post-->
                    <div class="card mb-4">
                        <div class="card-header">Popular Posts</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                @if($popular_posts)
                                    @foreach($popular_posts as $post)
                                    <ul class="list group list-group-flush">
                                        <li><a href="" class="list-group-flush">{{$post->title}} <span class="badge badge-info float-right">{{$post->view}}</span></a></li>
                                        
                                    </ul>
                                    @endforeach
                                    @endif
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
