@extends('layouts.main')
@section('content')
    @foreach($books as $book)
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Автор: {{$book->user->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">id:{{$book->id}}</h6>
                    <p class="card-text">Название книги: {{$book->name}}</p>
                    <a href="{{route('books.show', $book->id)}}" class="card-link">Посмотреть</a>
                    <form action="{{ route('books.restore', $book->id) }}" method="POST">
                        @csrf
                        <button>Восстановить</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
