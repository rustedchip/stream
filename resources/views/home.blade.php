@extends('app')

@section('content')
    <div class="px-3 ">
        @auth

            @include('new-post')


        @endauth
        <form method="post" action="{{ route('stream-search') }}" class="mb-4">
            @csrf
            <input type="text" value="{{ $search ?? '' }}"name="search" class="form-control bg-light " placeholder=". . .">
        </form>
        <div class="">
            @foreach ($stream as $post)
                <div class="row mb-4">
                    <div class="col-md-2 mb-1 text-muted fst-italic small">{{ $post->created_at->format('F j, Y h:m A') }}
                    </div>
                    <div class="col-md-10">{!! $post->content !!}</div>
                    @auth
                        @include('manage-post-button')
                    @endauth
                </div>
            @endforeach
            <hr>
            {{ $stream->links('paginator') }}
        </div>


    </div>
@endsection
