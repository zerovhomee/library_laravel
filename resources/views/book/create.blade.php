@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('books.store') }}" method ="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="InputTitle1">Название</label>
                <input type="text" class="form-control" name="name" id="InputTitle1" aria-describedby="emailHelp">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="InputDescription1">Текст</label>
                <textarea type="text" name="text" class="form-control" id="InputDescripton1"></textarea>
                @error('text')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="text_file">Или выберите текстовый файл:</label>
                <input type="file" name="text_file" id="text_file" accept=".txt">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
