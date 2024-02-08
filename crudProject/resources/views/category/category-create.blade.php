@extends('layouts.layout')

@section("content")
  <form action="{{ route('category-store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="label" class="form-label">libelle de Category : </label>
      <input type="text" name="libelle" id="label" class="form-control">
      <button class="btn btn-success my-3">Add Category</button>
    </div>
  </form>

@endsection