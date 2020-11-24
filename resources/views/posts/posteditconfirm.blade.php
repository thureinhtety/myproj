@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Update Post Confirmation</h2>
    <form method="post" action="{{url("/posts/update/$postconfirm->id")}}">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Title : &nbsp;</label>{{ $postconfirm->title}}
        </div>
        <div class="form-group">
            <label>Description : &nbsp;</label>{{ $postconfirm->description }}
        </div>
        <div class="form-group">
            <label>Status &nbsp; </label><input type="checkbox" name="status" value="{{ $postconfirm->status }}" <?php echo ($postconfirm->status)==1 ? 'checked' : '' ;?>>
        </div>
        <input type="submit" value="Update" class="btn btn-primary">
        <a class="btn btn-primary" href="{{url("/posts/edit/$postconfirm->id")}}" role="button">Cancel</a>
    </form>
</div>
@endsection