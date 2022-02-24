@extends('layouts.base')

@section('documentTitle')
    Edit {{ $comic->title}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3> Edit {{ $comic->title}}</h3>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('comics.update', $comic->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title}}">
                </div>
                <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $comic->author}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $comic->description}}</textarea>
                </div>
                <div class="mb-3">
                <label for="genre" class="form-label">genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="{{ $comic->genre}}">
                </div>
                <div class="mb-3">
                <label for="photo" class="form-label">photo</label>
                <input type="text" class="form-control" id="photo" name="photo" value="{{ $comic->photo}}">
                </div>
                <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $comic->price}}">
                </div>
                <a class="btn btn-primary mt-3" href="{{ route('comics.index') }}">Go Back</a>
                <button type="submit" class="btn btn-primary mt-3">Save</button>
            </form>
        </div>
    </div>
@endsection