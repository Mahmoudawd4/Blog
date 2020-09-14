@extends ('layout')

@section('title')
    All Admin
@endsection

@section('content')


<h1 class="container mt-5 text-center">All Admins</h1>

<div class="container mt-5 text-center">
    <a class="btn btn-info mb-3" href="{{ route('admin.register') }}">Create</a>
<table class="table m-auto text-center ">
    <thead>
        <tr class="bg-success">
            <th>Username</th>
            <th>email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Admins as $Admin)
        <tr class="bg-light">
            <td scope="row">{{$Admin ->username}}</td>
            <td>{{$Admin ->email}}</td>
            <td>

            <a href="{{ route('admin.edit',$Admin->id ) }}" class="btn btn-primary">Update</a>
            <a href="{{ route('admin.delete',$Admin->id ) }}" class="btn btn-danger">Delete</a>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>



</div>







@endsection


