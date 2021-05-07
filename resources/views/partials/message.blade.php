@if ($errors->count())
<div class="message is-error col-4 offset-4 fixed-top" id="message">
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <div class="text-center">{{ $error }}</div>
    </div>
    @endforeach
</div>
@endif
@if ( Session::has('message') )
<div class="alert alert-success col-4 offset-4 fixed-top fd-flex form-inline justify-content-center" id="message">
        <div><strong>Well done!</strong> {{ Session::get('message') }} </div>
</div>
@endif