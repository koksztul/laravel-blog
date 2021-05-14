@extends('layouts.master')
@section('title', $post->title)
    
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-8">
        <div class="tm-box-3">
            <div class="image d-flex justify-content-center">
                <div class="image">
                    <img src="{{ $post->photo }}" class="img-fluid" />
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p class="blockquote-footer">{{ $post->user->name }}</p>
                </div>
                <div class="col-3 offset-3">
                    <p><small>{{ $post->date->diffForHumans()}}</small></p>
                </div>
            </div>
            <h2>{!! $post->premium ? '[Prem] ' : '' !!} {!! $post->published ? '' : '[unPub]' !!} {{ $post->title }}</h2>
            <p> {{ $post->content }}.</p>
            @if($post->tags->count() > 0)
                <div class="form-inline p-2">
                    @foreach ($post->tags as $tag)
                        <a class="text-light p-1 m-1 bg-info rounded-pill" href="http://">{{ $tag->slug }}</a>
                    @endforeach
                </div>
            @endif
            @can('manage-posts')
                <a href="{{ route('admin.post.edit', $post->id) }}">Edit</a>
            @endcan
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <a rel="" href="{{asset('https://bbbootstrap.com/snippets/bootstrap-comments-list-font-awesome-icons-and-toggle-button-91650380')}}" target="_parent" class="">Bootstrap 5 comments list</a>    
            </div>
                <div class="row">  
                @if ($post->comments->count() > 0)
                    <div class="d-inline mr-1 h4">Comments</div>
                    <div id="com_count" class="d-inline h4">{{ $post->comments->count() }}</div>
                @else
                <div class="d-inline mr-1 h4">No comments yet</div>
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
                        @can('manage-posts')
                        <div class="action d-flex justify-content-between mt-2 align-items-center">    
                            <button class="btn btn-danger btn-sm delete" data-url="{{ route('admin.comment.delete', $comment->id) }}">Remove</button>
                        </div>
                        @endcan
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

@section('javascript')
$(function() {
    $('.delete').click(function() {
        Swal.fire({
            title: 'Are you sure that you want to remove this comment?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            var $this = $(this);
            if (result.value) {
                $.ajax({
                    method: "DELETE",
                    url: $(this).data("url"),
                    data: {
                        "_token": "{{ csrf_token() }}"
                        }
                })
                .done(function( response ) {
                    $this.closest(".card").fadeOut(500);
                    var count = parseInt($("#com_count").text());
                    count--;
                    $("#com_count").text(count).fadeOut(500);
                })
                .fail(function( response ) {
                    console.log($(this));
                    Swal.fire('Oops...', 'Something went wrong!', 'error');
                });
            }
        })
    });         
});   
@endsection