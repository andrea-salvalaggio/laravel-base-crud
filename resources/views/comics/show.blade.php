@extends('layouts.main')

@section('title', 'Comics: ' . $comic->title)

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <img class="mb-3 rounded-1" src=" {{ $comic->thumb }}" alt=" {{ $comic->title }}">
                <h3 class="fw-bold"> {{ $comic->title }}</h3>
                <span class="badge text-bg-danger"> Last sale: {{ $comic->sale_date }} </span>
                <span class="badge text-bg-secondary"> {{ $comic->type }} </span>
                <p class="mt-3"> {{ $comic->description }}</p>
                <hr>
                <p class="fw-bold"> € {{ $comic->price }}</p>
            </div>
        </div>
    </div>
@endsection