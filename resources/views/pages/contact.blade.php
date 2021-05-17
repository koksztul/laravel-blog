@extends('layouts.master')
@section('title', 'Contact')
    
@section('content')
<div class="row">
    <div class="col-lg-7 col-md-7 col-xs-12">
        <h2 class="text-center">Contact us</h2>
        <div class="contact_message">
            <form action="{{ route('contact') }}" method="POST" class="contact-form">
                @csrf
                <div class="row mb-2">
                    <div class="form-group col-xl-6">
                        <input type="text" id="contact_name" name="name" class="form-control" placeholder="Name" required/>
                    </div>
                    <div class="form-group col-xl-6 pl-xl-1">
                        <input type="email" id="contact_email" name="email" class="form-control" placeholder="Email" required/>
                    </div>
                </div>
                <div class="form-group">
                    <textarea id="contact_message" name="message" class="form-control" rows="6" placeholder="Message" required></textarea>
                </div>
                <button type="submit" class="btn btn btn-primary tm-btn-submit float-right btn-big">Send It Now</button>
            </form>
        </div>
    </div>
    <div class="col-lg-5 col-md-5 col-xs-12 tm-contact-right">
        <div class="tm-address-box">
            <p class="mb-5">Integer pretium volutpat tempor. Maecenas condimentum tincidunt leo. Paesent scelerisque erat placerat tempus laoreet. Vivamus pellentesque tempor congue.</p>
            <address>
                120-240 Proin mauris enim,
                <br> dignissim sit amet ligula id,
                <br> finibus tempus erat 10200
            </address>
        </div>
    </div>
</div>
@endsection