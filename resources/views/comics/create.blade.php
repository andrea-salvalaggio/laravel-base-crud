@extends('layouts.main')

@section('title', 'Create a new comic')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('comics.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="email" class="form-control" id="input-title" name="title">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cover</label>
                        <input type="email" class="form-control" id="input-cover" name="thumb">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="input-description" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Series</label>
                        <input type="email" class="form-control" id="input-series" name="series">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Type</label>
                        <select class="form-select" aria-label="Default select example" name="type">
                            <option selected>Choose type of comics</option>
                            <option value="1">comic book</option>
                            <option value="2">graphic novel</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Sale date</label>
                        <input type="date" class="form-control" id="input-date" name="sale_date">
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">Send your comic</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
