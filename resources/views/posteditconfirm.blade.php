@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Update Post Confirmation</h2>
    <form method="post" action="{{url("/update/$postconfirm->id")}}">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Title : </label>{{ $postconfirm->title}}
        </div>
        <div class="form-group">
            <label>Description : </label>{{ $postconfirm->description }}
        </div>

        <input type="submit" value="Update" class="btn btn-primary">
        <a class="btn btn-primary" href="/update/$postconfirm->id" role="button">Cancel</a>
    </form>
</div>
@endsection