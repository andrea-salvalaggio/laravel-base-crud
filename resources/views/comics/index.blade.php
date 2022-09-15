@extends('layouts.main')

@section('title', 'Comics')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                @if (session('delete'))
                    <div class="alert alert-warning">
                        "{{ session('delete') }}" è stato rimosso con successo.
                    </div>
                @endif

                @if (session('created'))
                    <div class="alert alert-success">
                        "{{ session('created') }}" è stato creato con successo.
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Series</th>
                          <th>Type</th>
                          <th>Sale Date</th>
                          <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($comics as $comic)
                            <tr class="align-middle">
                                <td> {{ $comic->id }} </td>
                                <td> <a href="{{ route('comics.show', $comic->id) }}"> {{ $comic->title }}</a> </td>
                                <td> {{ $comic->series }} </td>
                                <td> {{ $comic->type }} </td>
                                <td> {{ $comic->sale_date }} </td>
                                <td> {{ $comic->price }} </td>
                                <td>
                                    <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="d-inline form-delete"
                                        data-comic-name="{{ $comic->title }}">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10"> Comics are not available  </td>
                            </tr>
                        @endforelse
                    </tbody>                
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <script>
        
        const deleteFormElement = document.querySelectorAll('.form-delete');
        deleteFormElement.forEach(formElement => {
            formElement.addEventListener('submit', function (event){

                const name = this.getAttribute('data-comic-name');
                event.preventDefault();

                const result = window.confirm(`Sei sicuro di voler eliminare "${name}"?`);
                if (result) this.submit();
            })
        });

    </script>
@endsection