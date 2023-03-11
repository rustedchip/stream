@extends('app')
@section('content')
    <form class= "d-inline"method="POST" action="{{ route('update-post', $post) }}">
        @csrf
        @method('put')
        <textarea id="content" name="content" >{!! $post->content !!}</textarea>
        <button type="submit" class="btn btn-secondary btn-sm mt-2">update-post</button>

        
    </form>
    <form class="d-inline" method="POST" action="{{ route('delete-post', $post) }}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm mt-2">delete-post</button>
    </form>
    <hr>

    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#content',
            plugins: 'code, image, codesample',
        });
    </script>
@endsection
