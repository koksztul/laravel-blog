@extends('layouts.master')
@section('title', 'Create Post')
    
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <h1 class="text-center">Create Post</h1>
        <form method="POST" action="{{ route('admin.post.create') }}">
            @csrf
            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Example Title" value="{{ old('title') }}">
            </div>
            <label>date:</label>
            <input type="date" class="form-control" name="date" value="{{ old('date') }}">
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
                <label>Text:</label>
                <textarea class="form-control form-control" name="content" rows="4">{{ old('content') }}</textarea>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection