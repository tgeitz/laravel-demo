@if (Session::has('flash_message'))
    <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
        @if (Session::has('flash_message_important'))
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @endif
        {{ session('flash_message') }}</div>
@endif

<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>