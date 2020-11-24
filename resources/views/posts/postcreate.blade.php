@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Create Post</h2>
    <form method="get" action="{{url("/posts/confirm")}}">
        @csrf
        <div class="form-group">
            <label>Title</label><span class="required text-danger">*</span>
            <input type="text" name="title" id="title" class="col-sm-5 form-control input @error('title') is-danger @enderror" value="{{old('title')}}">
            @error('title')
            <p class="help is-danger">{{$errors->first('title')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label>Description</label><span class="required text-danger">*</span>
            <textarea name="description" id="description" class="col-sm-5 form-control input @error('description') is-danger @enderror">{{old('description')}}</textarea>
            @error('description')
            <p class="help is-danger">{{$errors->first('description')}}</p>
            @enderror
        </div>
        <input type="submit" value="Confirm" class="btn btn-primary">
        <a href="#" class="btn btn-primary" role="button" onclick="remove()">Clear</a>
    </form>
</div>
<script>
    function remove() {
        document.getElementById('title').value = '';
        document.getElementById('description').value = '';
    }
</script>
@endsection