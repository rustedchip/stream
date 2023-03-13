@extends('app')

@section('head')
    <title>rustedchip - manage-post</title>
@endsection

@section('content')
    <form class="d-inline" method="POST" action="{{ route('update-post', $post) }}">
        @csrf
        @method('put')
        <textarea id="content" name="content">{!! $post->content !!}</textarea>
        <button type="submit" class="btn btn-secondary btn-sm px-1 py-0 mt-2">
            <span class="material-icons mt-1">
                edit
            </span>
        </button>


    </form>
    <form class="d-inline" method="POST" action="{{ route('delete-post', $post) }}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm px-1 py-0 mt-2">
            <span class="material-icons mt-1">
                delete
            </span>
        </button>
    </form>
    <hr>

    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#content',
            plugins: 'code, image, codesample',
        });
    </script>
@endsection
