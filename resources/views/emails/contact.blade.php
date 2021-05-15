@component('mail::message')
# Hi {{config('app.name') }}!
From: {{ $data['email'] }} <br>
Name: {{ $data['name'] }} <br>
Message: {{ $data['message'] }}
@endcomponent