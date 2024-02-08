@extends('layouts.layout')

@section('content')
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$product->title}}</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">{{$product->price}} $</h6>
    <p class="card-text">{{$product->description}}</p>
    <a href="{{route('product')}}" class="card-link btn btn-info">Back</a>
  </div>
</div>
@endsection