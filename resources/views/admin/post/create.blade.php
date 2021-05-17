@extends('layouts.master')
@section('title', 'Create Post')
    
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <h1 class="text-center">Create Post</h1>
        <form method="POST" action="{{ route('admin.post.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Example Title" value="{{ old('title') }}" required>
            </div>
            <label>date:</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required>
            <label>Visible Options:</label>
            <div class="row">
                <div class="col-3">
                    <label>premium</label>
                    <input type="checkbox" name="premium" value="1">   
                </div>
                <div class="col-3">
                    <label>published</label>
                    <input type="checkbox" name="published" value="1">             
                </div>
            </div>
            <div class="form-group">
                <label>Text:</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="4" required>{{ old('content') }}</textarea>
            </div> 
            <div class="form-group">
                <label>Tags:</label>
                <input type="text" class="form-control" name="tags" placeholder="Example tags" value="{{ old('tags') }}">
            </div>   
            <div class="form-group">
                <label class="">Choose post image</label>
                <input type="file" class=" @error('content') is-invalid @enderror" name="image" required>
                @error('image')
                    <div class="invalid-feedback">Image is required</div>
                @enderror
            </div> 
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('javascript')
    $('#message').delay(3500).hide(0) 
@endsection