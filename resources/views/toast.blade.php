@error('content')
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <span class="me-auto material-icons text-primary">mode_comment</span>

                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ $message }}
            </div>
        </div>
    </div>
    <script>
        var getToast = document.getElementById('toast')
        var toast = bootstrap.Toast.getOrCreateInstance(getToast)
        toast.show()
    </script>
@enderror

@if (Session::has('message'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <span class="me-auto material-icons text-dark">mode_comment</span>

                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ Session::get('message') }}
            </div>
        </div>
    </div>
    <script>
        var getToast = document.getElementById('toast')
        var toast = bootstrap.Toast.getOrCreateInstance(getToast)
        toast.show()
    </script>
@endif
