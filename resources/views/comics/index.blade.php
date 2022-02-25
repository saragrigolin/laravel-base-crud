@extends('layouts.base')

@section('documentTitle')
    {{ $title }}
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <h1 class="h1">Admin - All Comics</h1>
        </div>
        <div class="row">
            <div class="col mb-2">
                <a href="{{ route('comics.create') }}" class="btn btn-primary">Add new comic</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-info">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-40">Title</th>
                            <th class="w-30">Author</th>
                            <th class="w-15">Price</th>
                            <th class="w-15">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($comics as $comic)
                        <tr>
                            <td class="text-capitalize">{{ $comic->title }}</td>
                            <td>{{ $comic->author }}</td>
                            <td>{{ $comic->price }} €</td>
                            <td>
                                <a class="btn btn-primary me-3" href="{{ route('comics.show', $comic) }}">View</a>
                                <a class="btn btn-warning" href="{{ route('comics.edit', $comic) }}">Edit</a>
                                <form action="{{ route('comics.destroy', $comic->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Cancella">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{ $comics->links() }}
            </div>
        </div>
    </div>
@endsection