@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Create Post Confirmation</h2>
    <form method="post" action="{{url("/create")}}">
        @csrf
        <div class="form-group">
            <label>Title : </label>{{ $postconfirm->title}}
        </div>
        <div class="form-group">
            <label>Description : </label>{{ $postconfirm->description }}
        </div>
        <input type="submit" value="Create" class="btn btn-primary">
        <a class="btn btn-primary" href="/create" role="button">Cancel</a>
    </form>
</div>
@endsection