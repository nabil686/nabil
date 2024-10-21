@extends('backend.master')
@section('content')

<h1>User List</h1>
<a class="btn btn-success" href="{{route('user.form')}}">Add New User</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Role</th>
      <th scope="col">Action<th>
    </tr>
  </thead>

  <tbody>

  @foreach ($allUser as $user)

<tr>
   <td>{{$user->id}}</td>
   <td>{{$user->name}}</td>
   <td>{{$user->role->name}}</td>
   <td> 
      <img src="{{url('/uploads/uploads/'.$user->image)}}" width="50px" height="50px">
  </td>

  <td>
      <a class="btn btn-primary" href="{{route('user.view',$user->id)}}">View</a>
      <a class="btn btn-danger" href="{{route('user.delete', $user->id)}}">Delete</a>
      <a class="btn btn-warning" href="{{route('user.edit', $user->id)}}">Edit</a>

  </td>

</tr>
@endforeach
    
  </tbody>
</table>
{{$allUser->links()}}

@endsection