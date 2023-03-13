<form method="POST" action="{{route('create-post')}}">
    @csrf
    <textarea id="content" name="content"></textarea>
    <button type="submit" class="btn btn-primary btn-sm px-1 py-0 mt-2">
        <span class="material-icons mt-1">
            save
            </span>
    </button>
    <hr>
</form>

<script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea#content',
        plugins: 'code, image, codesample',
    });
</script>