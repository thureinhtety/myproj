@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Create Post Confirmation</h2>
    <form method="post" action="{{url("/posts/create")}}">
        @csrf
        <div class="form-group">
            <label>Title : &nbsp;</label>{{ $postconfirm->title}}
        </div>
        <div class="form-group">
            <label>Description : &nbsp;</label>{{ $postconfirm->description }}
        </div>
        <input type="submit" value="Create" class="btn btn-primary">
        <a class="btn btn-primary" href="/posts/create" role="button">Cancel</a>
    </form>
</div>
@endsection