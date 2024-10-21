@extends('backend.master')

@section('content')

<h1>Role List</h1>
<a class="btn btn-primary" href="{{route('role.form')}}">  Add New Role</a>

<table class="table">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($allRole as $role)

  <tr>
     <td>{{$role->id}}</td>
     <td>{{$role->name}}</td>
     <td>{{$role->status}}</td>
     
    <td>
        <a class="btn btn-primary" href="">View</a>
        <a class="btn btn-danger" href="">Edit</a>
        <a class="btn btn-warning" href="{{route('role.delete',$role->id)}}">Delete</a>
        <a class="btn btn-danger" href="{{route('assign.permission',$role->id)}}">Assign Permission</a>

    </td>

  </tr>
  @endforeach

    
  </tbody>
</table>

{{$allRole->links()}}

@endsection