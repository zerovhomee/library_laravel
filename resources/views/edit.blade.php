@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('books.update', $book->id) }}" method ="post">
            @method('patch')
            @csrf
            <div class="form-group">
                <label for="InputTitle1">Название</label>
                <input type="text" value="{{$book->name}}" class="form-control" name="name" id="InputTitle1" aria-describedby="emailHelp">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="InputDescription1">Текст</label>
                <textarea type="text" name="text" class="form-control" id="InputDescripton1">{{$book->text}}</textarea>
                @error('text')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
