@extends('layouts.main')

@section('title', 'Comics: ' . $comic->title)

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <img class="mb-3 rounded-1" src=" {{ $comic->thumb }} " alt=" Image of {{ $comic->title }} ">
                <h3 class="fw-bold"> {{ $comic->title }}</h3>
                <span class="badge text-bg-danger"> Last sale: {{ $comic->sale_date }} </span>
                <span class="badge text-bg-secondary"> {{ $comic->type }} </span>
                <p class="mt-3"> {{ $comic->description }}</p>
                <hr>
                <p class="fw-bold"> € {{ $comic->price }}</p>
                <div class="text-center mt-5">
                    <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-outline-success me-3">Edit this comic</a>
                    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-outline-danger">Delete this comic</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection