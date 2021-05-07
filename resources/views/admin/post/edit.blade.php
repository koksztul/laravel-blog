@extends('layouts.master')
@section('title', 'Edit Post')
    
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <h1 class="text-center">Edit Post</h1>
        <form method="POST" action="{{ route('admin.post.edit', $post->id) }}">
            @csrf
            @method('PUT') 
                <label>Title:</label>
                <input type="text" class="form-control form-control-lg" name="title" placeholder="Example Title" value="{{ $post->title }}">
                <label>date:</label>
                <input type="date" class="form-control form-control-sm" name="date" value="{{ $post->date->format('Y-m-d') }}">
                <label>Visible Options:</label>
                <div class="row">
                    <div class="col-3">
                        <label>premium:</label>
                        <input type="checkbox" name="premium" value="1" {{ $post->premium ? ' checked' : ''}}><br>
                    </div>
                    <div class="col-3">
                        <label>published</label>
                        <input type="checkbox" name="published" value="1" {{ $post->published ? ' checked' : ''}}><br>
                    </div>
                </div>
                <label>Text:</label>
                <textarea class="form-control form-control" name="content" rows="4">{{ $post->content }}</textarea>
                <div class="row">
                    <div class="col-6">
                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE') 
                            <button class="btn btn-danger float-right" onclick="return confirm('Are u sure?')">Delete post</button>
                        </form>
                    </div>
                </div>
</div>
@endsection