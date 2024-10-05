@extends('backend.master')
@section('content')

<h1>Product List</h1>
<a class="btn btn-success" href="{{route('product.form')}}">Create New Product</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Price</th>
      <th scope="col">Product Image</th>
      <th scope="col">Action<th>
    </tr>
  </thead>

  <tbody>

  @foreach ($allProduct as $product)

<tr>
   <td>{{$product->id}}</td>
   <td>{{$product->name}}</td>
   <td>{{$product->category->name}}</td>
   <td>{{$product->price}} BDT</td>

   <td> 
      <img src="{{url('/uploads/uploads/'.$product->image)}}" width="50px" height="50px">
  </td>

  <td>
      <a class="btn btn-primary" href="{{route('product.view',$product->id)}}">View</a>
      <a class="btn btn-danger" href="{{route('product.delete', $product->id)}}">Delete</a>
      <a class="btn btn-warning" href="{{route('product.edit', $product->id)}}">Edit</a>

  </td>

</tr>
@endforeach
    
  </tbody>
</table>
{{$allProduct->links()}}

@endsection