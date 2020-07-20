@extends('layouts.master')
@section('content')
@include('partials.features')
<div class="container">
    @include('partials.promotion')
    <div class="row">
        @include('partials.categories')
        <div class="col-9">
            <div class="row">
                @foreach($pro as $product)
                    <div class="col-md-4  ">
                        <div class="card mt-1" style="width: 100%;">
                            <a class="text-decoration-none" href="{{ route('detail',$product->id) }}">
                            <img class="card-img-top sell-img" src="{{$product->resource_path}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 ><span class="rounded d-inline bg-warning float-right p-1" id="myDIV">{{$product->discount}}%</span></h5>
                                    <p class="card-text">{{$product->name}}</p>
                                    <p class="card-text">{{$product->description}}</p>
                                <p><del class="text-danger">${{$product->price}}</del></p>
                                <h5 class="d-inline">${{ ((100 - $product->discount) * ($product->price) /100)  }}</h5>
                                </div>
                            </a>
                        <a href="#" class="btn btn-white float-right border border-dark"><img class="cart-img" src="{{asset('icons/cart.png')}}" alt="cart"> Cart</a>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
