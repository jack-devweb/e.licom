@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $category->name }}</div>

                <div class="card-body">
                    <p>{{ $category->description }}</p>

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Products in this category:</h4>
                            <ul>
                                @foreach ($category->products as $product)
                                <li>{{ $product->name }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <h4>Actions:</h4>
                            <ul>
                                <li><a href="{{ route('categories.edit', $category->id) }}">Edit</a></li>
                                <li>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
