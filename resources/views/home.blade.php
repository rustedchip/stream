@extends('app')

@section('content')
    <div class="px-3 ">
        
        @auth
            @include('new-post')
        @endauth
        <form method="post" action="{{ route('stream-search') }}" class="mb-4">
            @csrf
            <div class="input-group mb-3">
                <input type="text" value="{{ $search ?? '' }}"name="search" class="form-control bg-light " placeholder=". . .">
                <button type="submit" class="input-group-text" id="basic-addon2"><span class="material-icons">search</span></button>
              </div>
              
            
        </form>
        <div class="">
            @foreach ($stream as $post)
                <div class="row mb-4">
                    <div class="col-md-2 mb-1 text-muted fst-italic small">{{ $post->created_at->format('F j, Y h:m A') }}
                    </div>
                    <div class="@auth col-md-8 @else col-md-10 @endauth">{!! $post->content !!}</div>
                    @auth
                    <div class="col-md-2">
                        @include('manage-post-button')
                    </div>
                    @endauth
                </div>
            @endforeach
          
            {{ $stream->links('paginator') }}
        </div>
    </div>
@endsection
