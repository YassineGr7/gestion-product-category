@extends('layouts.layout')

@section('content')
    <div class="mt-3 mb-3">
        <a class="btn btn-success" href="{{ route('product-create') }}">Add New Product</a>
    </div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td><a href="{{ route('product-view', ['id' => $product->id]) }}">{{ $product->title }}</a></td>
                    <td>{{ substr($product->description, 0, 20) }}...</td>
                    <td><b>{{ $product->price }} $</b></td>
                    <td>
                        @switch($product->category->libelle)
                            @case('clothes')
                                <span class="badge rounded-pill text-bg-primary">{{ $product->category->libelle }}</span>
                            @break

                            @case('electronics')
                                <span class="badge rounded-pill text-bg-warning">{{ $product->category->libelle }}</span>
                            @break

                            @case('accessories')
                                <span class="badge rounded-pill text-bg-info">{{ $product->category->libelle }}</span>
                            @break

                            @default
                                <span class="badge rounded-pill text-bg-secondary">{{ $product->category->libelle }}</span>
                        @endswitch
                    </td>
                    <td>
                        <form action="{{ route('product-delete', ['id' => $product->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-warning" href="{{ route('product-edit', ['id' => $product->id]) }}">Edit</a>
                            <button class="btn btn-danger" onclick="return confirm('Are You Sure ? ')"
                                type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
