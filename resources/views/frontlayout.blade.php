<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('frontend')}}/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('frontend')}}/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/bootstrap.min.css"/>
        <!--jquery-->
        <script type="text/javascript" scr="{{asset('frontend')}}/jquery-3.7.1.min.js"></script>
        
        <script type="text/javascript" scr="{{asset('frontend')}}/scripts'js"></script>

    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">L_Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('all-categories/')}}">Categories</a></li>
                        @guest
                        <li class="nav-item"><a class="nav-link" href="{{url('login')}}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('register')}}">Register</a>
                        
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{url('save-post-form')}}">Add Post</a>
                        <li class="nav-item"><a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{url('logout')}}">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endguest                       
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="container mt-4">
        @yield('content')
        
        </main>

        <!-- Bootstrap core JS-->
        <script src="{{asset('frontend')}}/https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('frontend')}}/js/scripts.js"></script>
    </body>
</html>