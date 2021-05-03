@if ($errors->count())
<div class="message is-error">
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" id="message">
            <div class="text-center">{{ $error }}</div>
    </div>
    @endforeach
</div>
@endif
@if ( Session::has('message') )
<div class="alert alert-success" id="message">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <div class="text-center"><strong>Well done!</strong> {{ Session::get('message') }} </div>
</div>
@endif