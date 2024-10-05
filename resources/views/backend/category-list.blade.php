@extends('backend.master')

@section('content')
<h1>Category List</h1>
<a class="btn btn-primary" href="{{route('category.form')}}">  Create Category</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Category Details</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($allCategory as $cat)

  <tr>
     <td>{{$cat->id}}</td>
     <td>{{$cat->name}}</td>
     <td>{{$cat->description}}</td>
    <td>{{$cat->status}}</td>

    <td>
        <a class="btn btn-primary" href="">Add</a>
        <a class="btn btn-danger" href="">Delete</a>
        <a class="btn btn-warning" href="">Edit</a>

    </td>

  </tr>
  @endforeach

    
  </tbody>
</table>

{{$allCategory->links()}}

@endsection
