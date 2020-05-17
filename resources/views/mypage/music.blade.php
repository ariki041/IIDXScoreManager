@extends('layouts.app')

@section('content')
    <h1> {{ $music[0]['title'] }} </h1>
    <hr>

    @foreach ($music as $key => $value)
        <div class="card p-3 m-3">
            <div class="card-body">
                <h4 class="card-title">{{ $value["title"] }}</h4>
                <p class="card-text">{{ print_r($value) }}</p>
            </div>
        </div>
    @endforeach

@endsection