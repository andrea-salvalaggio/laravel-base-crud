@extends('layouts.main')

@section('title', 'Create a new comic')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <form action="{{ route('comics.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="input-title" name="title" required>
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cover</label>
                        <input type="text" class="form-control" id="input-cover" name="thumb" required>
                    </div>
                    @error('thumb')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="input-description" rows="3" name="description"></textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Series</label>
                        <input type="text" class="form-control" id="input-series" name="series" required>
                    </div>
                    @error('series')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Type</label>
                        <select class="form-select" aria-label="Default select example" name="type" required>
                            @foreach ($types as $type)
                                <option value="{{ $type->type_name }}"> {{ $type->type_name }} </option>
                            @endforeach
                        </select>
                    </div>
                    @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Sale date</label>
                        <input type="date" class="form-control" id="input-date" name="sale_date" required>
                    </div>
                    @error('sale_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">€</span>
                        </div>
                        <input type="text" class="form-control" name="price" required>
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-outline-primary">Send your comic</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
