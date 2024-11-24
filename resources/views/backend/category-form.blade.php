@extends('backend.master')

@section('content')
<h1>Category Form</h1>
<form action="{{route('category.store')}}"  method="post" enctype="multipart/form-data">
@csrf 

<div class="from-group">
<lavel for="name">Enter Category Name</lavel>
<input name="cat_name" type="text" class="form-control" id="name" placeholder="Enter Category Name">
</div>
<div>
<label for="p"> Category Parent Name </label>
    <select name="parent_id" class="form-select" aria-label="Default select example">
    option value="">--Select Parent--</option>
    @foreach($allCategory as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach

    </select>
</div class="from-group">


<div class="from-group">
<lavel for="name">Enter Description</lavel>
<input name="cat_description" type="text" class="form-control" id="name" placeholder="Enter Description">
</div>


<button type="submit" class="btn btn-primary">Submit</button>

</form>


@endsection