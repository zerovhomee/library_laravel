@extends('layouts.main')
@section('content')
    <div>
        <form action="#" method ="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="InputTitle1">ID пользователя </label>
                <input type="text" class="form-control" name="name" id="InputTitle1" aria-describedby="emailHelp">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Дать доступ</button>
        </form>
    </div>
@endsection
