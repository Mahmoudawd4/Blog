@extends ('layout')


@section('title')

All post

@endsection

@section('content')
@foreach($posts as $post)

<div class="container">
<h1><a href="{{route('post.show',$post->id)}}">{{$post->title}}</a></h1>
<h3>{{$post->desc}}</h3>
<hr>
</div>

@endforeach

@endsection
