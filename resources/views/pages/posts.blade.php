@extends('layouts.master')
@section('title', 'Posts')
    
@section('content')
<div class="container">
    @foreach ($posts as $post)
    {!! $loop->index % 2 == 0 ? '<div class="row">' : '' !!}
            <div class="col-md-6">
                <div class="image">
                    <img src="img/tm-img-1.jpg" class="img-fluid" />
                </div>
                <div class="tm-box-5 p-3">
                    <h2>{!! $post->premium ? '[Prem] ' : '' !!} {!! $post->published ? '' : '[unPub]' !!}  {{ $post->excerptTitle }}</h2>
                    <p class> {{ $post->excerptContent }}.</p>
                    <div class="text-center">
                        <a href="{{ route('posts.single', $post->slug) }}" class="btn btn-secondary">Details</a>
                    </div>
                    @can('manage-posts')
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('admin.post.edit', $post->id) }}">Edit</a>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE')}}
                                <button class="button button--danger" onclick="return confirm('Are u sure?')">Delete post</button>
                            </form>
                        </div>
                    </div>
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
