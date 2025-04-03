@extends('layouts.main')
@section('content')
    <div>
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="#">Текущая книга</a>
                    </li>
                    @if($book->user_id === Auth::id())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('books.edit', $book -> id)}}">Изменить</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('books.destroy', $book->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Удалить" class="nav-link">
                        </form>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$book->name}}</h5>
                <p class="card-text">{{$book->text}}</p>
                <a href="{{route('books.index')}}" class="btn btn-primary">Назад</a>
            </div>
            <div class="card-footer text-muted">
                {{$book->user->name}}
            </div>
        </div>
    </div>
@endsection
