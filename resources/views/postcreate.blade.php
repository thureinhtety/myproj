@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Create Post</h2>
    <form method="post">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <input type="submit" value="Confirm" class="btn btn-primary">
        <input type="submit" value="Clear" class="btn btn-primary">
    </form>
</div>

@endsection