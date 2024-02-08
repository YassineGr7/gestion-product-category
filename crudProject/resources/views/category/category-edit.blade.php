@extends('layouts.layout')

@section("content")
  <form action="{{ route('category-update', ['id'=>$category->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="label" class="form-label">libelle de Category : </label>
      <input type="text" name="libelle" id="label" class="form-control" value="{{$category->libelle}}">
      <button class="btn btn-success my-3">Update</button>
    </div>
  </form>

@endsection