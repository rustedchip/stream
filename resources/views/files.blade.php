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

        @if (isset($google_bucket))
            @foreach ($files as $file)
                <div class="mb-1">
                    <a class="d-inline btn btn-secondary px-4"
                        href="https://storage.googleapis.com/{{ $google_bucket }}/{{ $file->name() }}" target="_blank">
                        https://storage.googleapis.com/{{ $google_bucket }}/{{ $file->name() }}
                    </a>
                    <form class="d-inline ms-4" action="{{ route('delete-file') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="file" value="{{ $file->name() }}">
                        <button type="submit" class="btn btn-danger btn-sm px-1 py-0 ">
                            <span class="material-icons mt-1">delete</span>
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            @foreach ($files as $file)
                <div class="mb-1">
                    <a class="d-inline btn btn-secondary px-4"
                        href="{{ config('app.url', '') }}/files/{{ basename($file) }}" target="_blank">
                        {{ config('app.url', '') }}/files/{{ basename($file) }}
                    </a>
                    <form class="d-inline ms-4" action="{{ route('delete-file') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="file" value="{{ $file }}">
                        <button type="submit" class="btn btn-danger btn-sm px-1 py-0 ">
                            <span class="material-icons mt-1">delete</span>
                        </button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
@endsection
