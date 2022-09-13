@extends('layouts.main')

@section('title', 'Comics: ' . $comic->title)

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <img class="mb-3" src=" {{ $comic->thumb }}" alt=" {{ $comic->title }}">
                <h3> {{ $comic->title }}</h3>
                <p> {{ $comic->description }}</p>
                <p> {{ $comic->sale_date }}</p>
                <p> {{ $comic->type }}</p>
                <hr>
                <p> € {{ $comic->price }}</p>
            </div>
        </div>
    </div>
@endsection