@extends ('layout')

@section("title")

Update Admin

@endsection


@section('content')

    @include ('inc.errors')

    <form class="form-group w-75 py-5 m-auto " method="POST" action="{{route('admin.update',$admin->id)}}" >

        @csrf
    <input type="text" name="username"  class="form-control mt-4" placeholder="username" value="{{old('email') ?? $admin->username}}" >
    <input type="email" name="email"  class="form-control mt-4" placeholder="email" value="{{old('email') ?? $admin->email}}" >

      <button type="submit" class="btn btn-primary mt-5">update</button>
    </form>



@endsection

