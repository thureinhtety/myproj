@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Update Post</h2>
    <form method="post" action="{{ url("/update/$post->id") }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control">{{$post->description}}</textarea>
        </div>
        <div>
            <label>Status</label>
            <input type="checkbox" name="status" checked>
        </div>
        <input type="submit" value="Confirm" class="btn btn-primary">
        <input type="submit" value="Clear" class="btn btn-primary">
    </form>
</div>

@endsection