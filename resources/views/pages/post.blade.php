@extends('layouts.master')
@section('title', $post->title)
    
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-8">
        <div class="tm-box-3">
            <div class="image d-flex justify-content-center">
                <img src="{{ asset('img/tm-img-1.jpg') }}" class="img-fluid" />
            </div>
            <h2>{{ $post->title }}</h2>
            <p> {{ $post->content }}.</p>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <a rel="" href="{{asset('https://bbbootstrap.com/snippets/bootstrap-comments-list-font-awesome-icons-and-toggle-button-91650380')}}" target="_parent" class="">Bootstrap 5 comments list</a>
            <div class="headings d-flex justify-content-between align-items-center mb-3">
                @if ($post->comments->count() > 0)
                    <h5>Comments({{ $post->comments->count() }})</h5>
                @else
                    <h5>No comments yet</h5>
                @endif
            </div>
            @if ($post->comments->count() > 0)
                @foreach ($post->comments as $comment)
                    <div class="card p-3 m-1">
                        <div class="d-flex justify-content-start reply px-4">
                            <small>{{ $comment->date->diffForHumans() }}</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="user d-flex flex-row align-items-center"> <img src="{{asset('dist/img/user2-160x160.jpg')}}" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">{{ $comment->user->name }}</small> <small class="font-weight-bold">{{$comment->text}}</small></span></div>
                        </div>
                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                            <!--
                            <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                            -->
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-md-8">
        @if (Auth::user())
            <form method="POST" action="{{ route('comment.create') }}">
                @csrf
                <label for="comment">Write Comment:</label>
                <textarea class="form-control {{ $errors->has('text') ? ' is-invalid' : '' }}" rows="2" id="comment" name="text"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit" class="btn btn-secondary">Comment</button>
            </form>
        @else
        <a rel="" href="{{ route('login') }}" target="_parent" class="">Sign in to add a comment</a>
        @endif
        </div>
    </div>

</div>
@endsection