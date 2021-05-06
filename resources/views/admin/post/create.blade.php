@extends('layouts.master')
@section('title', 'Create Post')
    
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <h1>Create Post</h1>
        <form method="POST" action="{{ route('admin.post.create') }}">
            @csrf
                <label>Title:</label>
                <input type="text" class="form-control form-control-lg" name="title" placeholder="Example Title" value="{{ old('title') }}">
                <label>date:</label>
                <input type="date" class="form-control form-control-sm" name="date" value="{{ old('date') }}">
                <div class="row">
                    <div class="col-3">
                        <label>premium:</label>
                        <input type="checkbox" class="form-check" name="premium" value="1"><br>
                    </div>
                    <div class="col-3">
                        <label>published</label>
                        <input type="checkbox" class="form-check" name="published" value="1"><br>
                    </div>
                </div>
                <label>Text:</label>
                <textarea class="form-control form-control" name="content" rows="4">{{ old('content') }}</textarea>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection