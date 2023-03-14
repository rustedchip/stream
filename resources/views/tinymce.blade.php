<script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea#content',
        plugins: 'code, image, codesample, link, autolink,emoticons,table',
    });
</script>