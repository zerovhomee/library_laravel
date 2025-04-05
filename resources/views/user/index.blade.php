@extends('layouts.main')
@section('content')
    <div>
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="true" href="#">Список пользователей</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.access') }}">Дать доступ другому пользователю</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Посмотреть книги другого пользователя</a>
            </li>
        </ul>
        <div class="container my-5">
            <div class="row row-cols-1 row-cols-md-3 g-2">
                @foreach($users as $user)
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Автор: {{$user->name}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">id:{{$user->id}}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
