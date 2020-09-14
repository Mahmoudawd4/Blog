@extends ('layout')


@section('title')

show post - {{$post->id}}

@endsection




@section('content')

<div class="container mt-5">

    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('uploads/'.$post->image)}}" class="img-fluid" alt="">
        </div>

        <div class="col-md-4">

            <h1>{{$post->title}}</h1>
            <p>{{$post->desc}}</p>
            <h4>{{$post->content}}</h4>

            @auth

            <a href="{{ route('post.edit',$post->id ) }}" class="btn btn-primary">Update</a>
            <a href="{{ route('post.delete',$post->id ) }}" class="btn btn-danger">Delete</a>
            <a class="btn btn-info" href="{{ route('post.all') }}">back</a>

            @endauth




        </div>
    </div>




</div>

@endsection
