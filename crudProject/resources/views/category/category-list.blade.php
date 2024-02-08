@extends('layouts.layout')

@section('content')
    <div class="my-3">
        <a href="{{ route('category-create') }}" class="btn btn-success">
            Add New Category
        </a>
    </div>
    <table class="table  mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">libelle</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $cat)
                <tr>
                    <th scope="row">{{ $cat->id }}</th>
                    <td>
                        @switch($cat->libelle)
                            @case('clothes')
                                <a href="{{ route('category-view', ['id' => $cat->id]) }}">
                                    <span class="badge rounded-pill text-bg-primary">{{ $cat->libelle }}</span>
                                </a>
                            @break

                            @case('electronics')
                                <a href="{{ route('category-view', ['id' => $cat->id]) }}">
                                    <span class="badge rounded-pill text-bg-warning">{{ $cat->libelle }}</span>
                                </a>
                            @break

                            @case('accessories')
                                <a href="{{ route('category-view', ['id' => $cat->id]) }}">
                                    <span class="badge rounded-pill text-bg-info">{{ $cat->libelle }}</span>
                                </a>
                            @break

                            @default
                                <a href="{{ route('category-view', ['id' => $cat->id]) }}">
                                    <span class="badge rounded-pill text-bg-secondary">{{ $cat->libelle }}</span>
                                </a>
                        @endswitch
                    </td>
                    <td>
                        <form action="{{ route('category-destroy', ['id' => $cat->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-warning" href="{{ route('category-edit', ['id' => $cat->id]) }}">Edit</a>
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you Sure ? ')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
