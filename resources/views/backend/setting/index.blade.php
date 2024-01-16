@extends('layout')
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card-header">
                    <h1 class="h3 mb-4 text-gray-800">Manage Settings</h1>
                     
                    </div>

                    @if($errors)
                    @foreach($errors->all() as $error)
                       <p class="text-danger">{{$error}}</p>
                    @endforeach
                    @endif

                    @if(Session::has('success'))
                       <p class="text-success">{{session('success')}}</p>
                    @endif

                    <form method="post" action="{{url('admin/setting')}}" enctype="multipart/form-data">
                        @csrf
                        
                    <table>
                       <div class="form-group">
                            <label for="formGroupInput">Comment Auto Approve</label>
                            <input @if($setting) value="{{$setting->comment_auto}}"@endif type="text" name="comment_auto" class="form-control" id="formGroupInputtitle" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">User Auto Approve</label>
                            <input @if($setting) value="{{$setting->user_auto}}" @endif type="text" name="user_auto" class="form-control" id="formGroupInputtitle" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Recent Post Limit</label>
                            <input @if($setting) value="{{$setting->recent_limit}}" @endif type="text" name="recent_limit" class="form-control" id="formGroupInputtitle" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Popular Post Limit</label>
                            <input @if($setting) value="{{$setting->popular_limit}}" @endif type="text" name="popular_limit" class="form-control" id="formGroupInputtitle" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Recent Commetns Limit</label>
                            <input @if($setting) value="{{$setting->recent_comment_limit}}" @endif type="text" name="recent_comment_limit" class="form-control" id="formGroupInputtitle" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        
                    </table>    
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

@endsection