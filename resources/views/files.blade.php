@extends('app')
@section('head')
    <title>{{ config('app.name', 'stream') }} - files</title>
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('upload-file') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="file" name="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-sm px-1 py-0 mt-2">
                <span class="material-icons mt-1">save</span>
            </button>
        </form>
        <hr>
        @foreach ($files as $file)

        {{print_r($file)}}

        @endforeach
    </div>
@endsection
