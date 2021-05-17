<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function send(SendContactRequest $request)
    {
        Mail::to(config('mail.admin.address'))->send(new Contact($request->all()));

        return back()->with('message', 'Your message has been sent!');
    }
}
