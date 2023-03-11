@extends('app')
@section('head')
    <title>rustedchip - about</title>
@endsection
@section('content')
    <div class="container">
        {!! $post->content ?? '' !!}
    </div>
@endsection
