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
            <div class="col">
                <h1>{{ $comic->title }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <img class="fluid-img" src=" {{$comic->photo }}" alt="{{$comic->title}}">
            </div>
            <div class="col">
                <div>{{ $comic->description }}</div>
                <div><h2>{{  $comic->price }} €</h2></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary mt-3" href="{{ route('comics.index') }}">Go Back</a>
            </div>
        </div>
    </div>
@endsection