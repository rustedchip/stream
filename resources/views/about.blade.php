@extends('app')
@section('head')
    <title>{{ config('app.name', 'stream') }} - about</title>
@endsection
@section('content')
    <div class="container">
        {!! $post->content ?? '' !!}
    </div>
@endsection
