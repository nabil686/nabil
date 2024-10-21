@extends('backend.master')


@section('content')



<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0" src="{{url('/uploads/uploads/'.$user->image)}}" alt="user image" style="width: 300px;"></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder">{{$user->name}}</h1>
                        
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem">
                        </div>
                    </div>
                </div>
            </div>
        </section>




@endsection