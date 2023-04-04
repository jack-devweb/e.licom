@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des catégories</h1>

        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('categories.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Rechercher une catégorie...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('categories.create') }}" class="btn btn-success">Ajouter une catégorie</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.show', ['id' => $category->id]) }}" class="btn btn-primary">Voir</a>
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-secondary">Modifier</a>
                            <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
           {{ $categories->links() }}
        </table>
    </div>
@endsection
