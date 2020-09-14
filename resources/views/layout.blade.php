<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    @yield('title')
    </title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-info">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">


            <li class="nav-item">
                <a class="nav-link" href="{{ route('post.all') }}">All posts</a>
            </li>



        @guest



        <li class="nav-item">
            <a class="nav-link" href="{{ route('message.create') }}">Contact Us</a>
        </li>


        @endguest




            @auth

            <li class="nav-item">
                <a class="nav-link" href="{{ route('post.create') }}">Add post</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('message.all') }}">Messages All</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.all') }}">Admins</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.logout') }}">logout</a>
            </li>


            @endauth


        </ul>

    </div>
</nav>



    @yield('content')



    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstarp.min.js')}}"></script>
</body>
</html>
