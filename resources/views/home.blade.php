@extends('frontlayout')
@section('title','Home')
@section('content')
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                
                        @if(count($posts)>0)
                            @foreach($posts as $post)
                                
                                    <!-- Blog post-->
                                     <div class="card mb-4">
                                     
                                       <a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}"><img class="card-img-top" src="{{asset('imgs/thumb/'.$post->thumb)}}" alt="{{$post->title}}" /></a>
                                        <div class="card-body">
                                            
                                                <h2 class="card-title"><a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}">{{$post->title}}</a></h2>
                                                <a class="btn btn-primary" href="#!">Read more →</a>
                                            </div>
                                    </div>
                                      
                            @endforeach
                        @else
                            <p class="alert alert-danger">No Post Found</p>
                        @endif
                        </div>        
                                </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        {{$posts->links()}}
                    </nav>
                    
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
