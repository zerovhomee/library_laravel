@extends('layouts.main')
@section('content')
    <div>
        <div class="container my-5">
            <div class="row row-cols-1 row-cols-md-3 g-2">
                @foreach(auth()->user()->sharedLibraryFrom() as $access)
                    <li>
                        <a href="{{ route('library.show', $access->owner_id) }}">
                            {{ $access->owner->name }}
                        </a>
                    </li>
                @endforeach
            </div>
        </div>
    </div>
@endsection
