@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('users.show.process') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="userId" class="form-label">ID пользователя</label>
                <input type="number"
                       class="form-control @error('user_id') is-invalid @enderror"
                       id="userId"
                       name="user_id"
                       required
                       min="1">

                @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Открыть библиотеку пользователя</button>
        </form>
    </div>
@endsection
