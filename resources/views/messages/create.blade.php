@extends ('layout')

@section("title")

creat  Message

@endsection


@section('content')

    @include ('inc.errors')

    <h1 class="mt-5">Create Message</h1>

    <form class="form-group w-75 py-2 m-auto " method="POST" action="{{route('message.store')}}" >

        @csrf
    <input type="text" name="name"  class="form-control mt-4" placeholder="name" value="{{old('name')}}" >
    <input type="email" name="email"  class="form-control mt-4" placeholder="email" value="{{old('email')}}" >
    <input type="text" name="phone"  class="form-control mt-4" placeholder="phone" value="{{old('phone')}}" >

    <textarea name="message" id="" cols="30" rows="10" placeholder="message" class="form-control mt-4">{{old('message')}}</textarea>

      <button type="submit" class="btn btn-primary mt-5">Add Message</button>
    </form>




@endsection

