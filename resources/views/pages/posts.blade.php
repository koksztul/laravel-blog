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
                    <h2>{!! $post->premium ? '[Prem] ' : '' !!} {!! $post->published ? '' : '[unPub]' !!}  {{ $post->excerptTitle }}</h2>
                    <p class> {{ $post->excerptContent }}.</p>
                    <div class="text-center">
                        <a href="{{ route('posts.single', $post->slug) }}" class="btn btn-secondary">Details</a>
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
