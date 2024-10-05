@extends('backend.master')

@section('content')
<h1>Category Form</h1>
<form action="{{route('category.store')}}"  method="post" enctype="multipart/form-data">
@csrf 

<div class="from-group">
<lavel for="name">Enter Category Name</lavel>
<input name="cat_name" type="text" class="form-control" id="name" placeholder="Enter Category Name">
</div>
<div class="from-group">
<lavel for="name">Enter Description</lavel>
<input name="cat_description" type="text" class="form-control" id="name" placeholder="Enter Description">
</div>


<button type="submit" class="btn btn-primary">Submit</button>

</form>


@endsection