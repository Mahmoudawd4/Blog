@extends ('layout')

@section("title")

creat  new Admin

@endsection


@section('content')

    @include ('inc.errors')

    <form class="form-group w-75 py-5 m-auto " method="POST" action="{{route('handel.register')}}" >

        @csrf
    <input type="text" name="username"  class="form-control mt-4" placeholder="username" value="{{old('username')}}" >
    <input type="email" name="email"  class="form-control mt-4" placeholder="email" value="{{old('email')}}" >
    <input type="password" name="password"  class="form-control mt-4" placeholder="password" value="{{old('password')}}" >

      <button type="submit" class="btn btn-primary mt-5">create</button>
    </form>




@endsection

