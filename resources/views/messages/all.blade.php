@extends ('layout')

@section('title')
    All Message
@endsection

@section('content')


<h1 class="container mt-5 text-center">All Message</h1>

<div class="container">
<table class="table m-auto text-center">
    <thead>
        <tr class="bg-success">
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Messages as $Message)
        <tr class="bg-light">
            <td scope="row">{{$Message ->name}}</td>
            <td>{{$Message ->email}}</td>
            <td>{{$Message ->phone}}</td>
            <td>{{$Message ->message}}</td>
            <td>
                <a href="{{ route('message.delete',$Message->id ) }}" class="btn btn-danger">Delete</a>
            </>
        </tr>
        @endforeach
    </tbody>
</table>

</div>







@endsection


