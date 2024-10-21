@extends('backend.master')

@section('content')

<h1> Create new product</h1>
<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
 @csrf
 <div class="form-group">
    <label for="p_name">Enter Product name</label>
    <input required name="product_name" type="text" class="form-control" id="p_name" placeholder="Enter product name">
 </div>

 <div class="form-group">
    <label for="p">Select category name</label>
    <select name="category_id" id="category_id" class="form-control">
      <option value="">--Select Category--</option>
    @foreach ($allCategory as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach

    </select>
 </div>

 <div class="form-group">
    <label for="p_price">Enter Product price </label>
    <input required name="product_price" type="text" class="form-control" id="p_price" placeholder="Enter product price">
 </div>

 <div class="form-group">
    <label for="image">Upload Product Image</label>
    <input name="product_image" type="file" class="form-control" id="image" placeholder="Upload product image">
 </div>

 <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection