@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Update Post</h2>
    <form method="get" action="{{ url("/update/$post->id") }}">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control input @error('title') is-danger @enderror" value="{{$post->title}}">
            @error('title')
            <p class="help is-danger">{{$errors->first('title')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control input @error('description') is-danger @enderror">{{$post->description}}</textarea>
            @error('description')
            <p class="help is-danger">{{$errors->first('description')}}</p>
            @enderror
        </div>
        <div>
            <label>Status</label>
            <input type="checkbox" name="status" checked>
        </div>
        <input type="submit" value="Confirm" class="btn btn-primary">
        <input type="reset" value="Clear" class="btn btn-primary">
    </form>
</div>

@endsection