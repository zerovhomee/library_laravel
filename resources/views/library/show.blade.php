@extends('layouts.main')
@section('content')
    <div class="container">
        <h2>Библиотека пользователя: {{ $libraryOwner->name }}</h2>

        @if($books->isEmpty())
            <div class="alert alert-info">
                В этой библиотеке пока нет книг
            </div>
        @else
            <div class="row">
                @foreach($books as $book)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->name }}</h5>
                                <p class="card-text">
                                    Владелец: {{ $book->user->name }}
                                </p>
                                <p class="text-muted">
                                    Добавлено: {{ $book->created_at->format('d.m.Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <a href="{{ route('users.show.form') }}" class="btn btn-secondary">
            Вернуться к поиску
        </a>
    </div>
@endsection
