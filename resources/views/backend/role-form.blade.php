@extends('backend.master')

@section('content')
<div style="padding: 10px;">
    <a href="{{route('role.list')}}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Back
    </a>
</div>
<h1>Role Create Form</h1>
<form action="{{route('role.store')}}"  method="post" enctype="multipart/form-data">
@csrf 

<div class="from-group">
<lavel for="name">Role Name</lavel>
<input name="role_name" required type="text" class="form-control" id="name" placeholder="Enter Role Name">
</div>

<div class="from-group">
<lavel for="name">Status</lavel>
<input name="role_status" type="text" class="form-control" id="name" placeholder="Enter Role">
</div>


<button type="submit" class="btn btn-primary">Submit</button>

</form>


@endsection