@extends('layouts.main')
@section('content')
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-3 g-2">
            @foreach($books as $book)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Автор: {{$book->user->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$book->name}}</h6>
                            <p class="card-text">{{$book->text}}</p>
                            <a href="{{route('books.show', $book->id)}}" class="card-link">Посмотреть</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
