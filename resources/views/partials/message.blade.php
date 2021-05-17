@if ($errors->count())
<div class="message is-error col-7 offset-3 fixed-top" id="message">
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <div class="text-center">{{ $error }}</div>
    </div>
    @endforeach
</div>
@endif

@if ( Session::has('message') )
<script type="text/javascript">
    $( document ).ready(function() {
        Swal.fire('Well Done', ' {{ Session::get('message') }} ' , 'success')
    });
</script>
@endif