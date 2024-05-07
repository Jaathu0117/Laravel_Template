@extends('layouts.app')
@section('main')
<h5><i class="bi bi-pencil-square"></i>Product Details</h5>
<nav class="my-3">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">View Product</li>
    </ol>
</nav>

<div class="card">
  <img class="card-img-top" src="/products/{{$product->image}}" alt="{{$product->name}}"/>

  <div class="card-body">
    <h5 class="card-title fw-bold">{{$product->name}}</h5>
    <p class="card-text text-secondary">{{$product->description}}</p>

    <p class="fw-semibold">M.R.P <small class="text-danger text-decoration-line-thorugh">{{$product->mrp}}</small></p>
    <p class="fw-semibold">Selling Price <small class="text-success">{{$product->price}}</small></p>


  </div>
</div>
@endsection
