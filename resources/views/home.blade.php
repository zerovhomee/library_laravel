@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('You are logged in!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="nav-link active" aria-current="true" href="{{route('books.index')}}">Перейти к книгам</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
