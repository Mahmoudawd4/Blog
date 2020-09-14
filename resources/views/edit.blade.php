@extends ('layout')

@section('title')

edit Post - {{$post->id}}

@endsection

@section('content')

@include ('inc.errors')


<form class="form-group w-75 py-5 m-auto " method="POST" action="{{route('post.updata' , $post->id)}}" enctype="multipart/form-data">

@csrf

<input type="text" name="title"  class="form-control" placeholder="title" value="{{old('title') ?? $post ->title}}" >
<textarea  class="form-control mt-2" name="desc" placeholder="descraption"  rows="3">{{old('desc')?? $post ->desc}}</textarea>
<textarea  class="form-control mt-2" name="content" placeholder="content"  rows="3">{{old('content') ?? $post ->content}}</textarea>
<input type="file" name="image" >
<button type="submit" class="btn btn-primary mt-5">submit</button>
</form>



@endsection

