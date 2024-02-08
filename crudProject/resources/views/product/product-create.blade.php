@extends('layouts.layout')

@section('content')
    <form action="{{ route('product-store') }}" method="POST">
        @csrf
        <div class="mb-3 ">
            <input type="text" class="form-control" name="title" id="title" placeholder="Product Title ..." required>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Product Description ... " id="floatingTextarea2" name="description"
                style="height: 100px" required></textarea>
            <label for="floatingTextarea2" class="form-label">Product Description: </label>
        </div>
        <div class="input-group mb-3">
            <input type="number" name="price" class="form-control" placeholder="Product Price"
                aria-label="Dollar amount (with dot and two decimal places)" required>
            <span class="input-group-text">$</span>
            <span class="input-group-text">.00</span>
        </div>
        <div class="mb-3">

          <select class="form-select mb-3" name="category" aria-label="Large select example">
            <option>Select Product category :</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->libelle}}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
@endsection
