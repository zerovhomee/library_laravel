@extends('layouts.main')
@section('content')
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
@endsection
