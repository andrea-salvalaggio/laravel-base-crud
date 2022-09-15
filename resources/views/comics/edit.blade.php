@extends('layouts.main')

@section('title', 'Create a new comic')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <form action="{{ route('comics.update', $comic->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="input-title" name="title" value="{{ $comic->title }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cover</label>
                        <input type="text" class="form-control" id="input-cover" name="thumb" value="{{ $comic->thumb }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="input-description" rows="3" name="description"> {{ $comic->description }} </textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Series</label>
                        <input type="text" class="form-control" id="input-series" name="series" value="{{ $comic->series }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Type</label>
                        <select class="form-select" aria-label="Default select example" name="type" value="{{ $comic->type }}" required>
                            <option selected>Choose type of comics</option>
                            <option value="comic book">comic book</option>
                            <option value="graphic novel">graphic novel</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Sale date</label>
                        <input type="date" class="form-control" id="input-date" name="sale_date" value="{{ $comic->sale_date }}" required>
                    </div>

                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">€</span>
                        </div>
                        <input type="text" class="form-control" name="price" value="{{ $comic->price }}" required>
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-outline-primary">Edit your comic</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection