<form method="POST" action="{{route('create-post')}}">
    @csrf
    <textarea id="content" name="content"></textarea>
    <button type="submit" class="btn btn-primary btn-sm mt-2">new-post</button>
    <hr>
</form>

<script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea#content',
        plugins: 'code, image, codesample',
    });
</script>