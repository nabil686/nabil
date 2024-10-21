@extends('backend.master')

@section('content')

<div style="padding: 10px;">
    <a href="{{route('user.list')}}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<h1> User Create Form</h1>
<form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
 @csrf
 
 <div class="form-group">
    <label for="u_name">User Name</label>
    <input required name="user_name" type="text" class="form-control" id="u_name" placeholder="Enter user name">
 </div>

 <div class="form-group">
    <label for="p">Role</label>
    <select name="role_id" id="role_id" class="form-control">
      <option value="">--Select Option--</option>
    @foreach ($allRole as $role)
    <option value="{{$role->id}}">{{$role->name}}</option>
    @endforeach

    </select>
 </div>

 <div class="form-group">
    <label for="u_email">Email </label>
    <input required name="email" type="email" class="form-control" id="p_price" placeholder="Enter email">
 </div>
 <div class="form-group">
    <label for="u_password">Password </label>
    <input required name="password" type="password" class="form-control" id="u_password" placeholder="Enter password">
 </div>

 <div class="form-group">
    <label for="image">Image</label>
    <input name="image" type="file" class="form-control" id="image" placeholder="Upload image">
 </div>

 <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection