@extends('layouts.master')
@section('title', 'Posts')
    
@section('content')
<div class="container">
    @foreach ($posts as $post)
    {!! $loop->index % 2 == 0 ? '<div class="row">' : '' !!}
            <div class="col-md-6">
                <div class="image">
                    <img src="{{ $post->photo }}" class="img-fluid" />
                </div>
                <div class="tm-box-5 p-3">
                    <div class="row">
                        <div class="col-6">
                            <p class="blockquote-footer">{{ $post->user->name }}</p>
                        </div>
                        <div class="col-3 offset-3">
                            <p><small>{{ $post->date->diffForHumans()}}</small></p>
                        </div>
                    </div>
                    <h2 class="text-truncate">{!! $post->premium ? '[Prem] ' : '' !!} {!! $post->published ? '' : '[unPub]' !!}  {{ $post->excerptTitle }}</h2>
                    <p class="text-truncate"> {{ $post->excerptContent }}.</p>
                    <div class="text-center">
                        <a href="{{ route('posts.single', $post->slug) }}" class="btn btn-secondary">Details</a>
                    </div>
                    <div class="form-inline p-2">
                    @foreach ($post->tags as $tag)
                        <a class="text-light p-1 m-1 bg-info rounded-pill" href="http://">{{ $tag->name }}</a>
                    @endforeach
                    </div>
                    @can('manage-posts')
                        <a href="{{ route('admin.post.edit', $post->id) }}">Edit</a>
                    @endcan
                </div>
            </div>
    {!! $loop->index % 2 != 0 ? '</div> <br>' : '' !!}
    @endforeach
</div>
@endsection

@section('pagination')
    @include('partials.pagination')
@endsection
