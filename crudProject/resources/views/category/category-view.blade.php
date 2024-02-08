@extends('layouts.layout')

@section('content')
    <div class="row">
      <div class="col-md-1"></div>
        <div class="card col-md-10 text-center" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $category->libelle }}</h5>
            </div>
        </div>
      <div class="col-md-1"></div>

    </div>
@endsection
